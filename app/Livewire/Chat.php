<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Services\ImageService;
use Illuminate\Support\Facades\Storage;

class Chat extends Component
{
    use WithFileUploads;

    public $chats = [];
    public $activeChatId = null;
    public $messages = [];
    public $message = '';
    public $file;
    public $sending = false;

    protected function getListeners()
    {
        return ['notify', 'refreshChats' => 'loadChats'];
    }

    public function mount()
    {
        $this->loadChats();
    }

    public function loadChats()
    {
        $user = auth()->user();

        $this->chats = Chat::with(['customer', 'messages' => function ($q) {
                $q->latest()->take(1);
            }])
            ->where(function ($q) use ($user) {
                $q->where('admin_id', $user->id)->orWhereNull('admin_id');
            })
            ->latest()
            ->get()
            ->map(function ($chat) use ($user) {
                $lastMsg = $chat->messages->first();
                $unread = ChatMessage::where('chat_id', $chat->id)
                    ->where('sender_id', '!=', $user->id)
                    ->where('is_read', false)
                    ->count();

                return [
                    'id' => $chat->id,
                    'name' => $chat->customer->name ?? 'Unknown',
                    'time' => $lastMsg?->created_at->format('H:i') ?? $chat->created_at->format('H:i'),
                    'lastMessage' => $lastMsg?->message ?? ($lastMsg?->file_name ? '📎 ' . $lastMsg->file_name : 'Belum ada pesan'),
                    'unread' => $unread,
                    'online' => false,
                ];
            })
            ->values()
            ->toArray();

        // Re-load messages if chat is still active
        if ($this->activeChatId) {
            $this->loadMessages($this->activeChatId);
        }
    }

    public function loadMessages($chatId)
    {
        $this->activeChatId = $chatId;
        $user = auth()->user();

        // Mark as read
        ChatMessage::where('chat_id', $chatId)
            ->where('sender_id', '!=', $user->id)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        // Update unread count in sidebar
        $this->chats = collect($this->chats)->map(function ($c) use ($chatId) {
            if ($c['id'] == $chatId) $c['unread'] = 0;
            return $c;
        })->toArray();

        $this->messages = ChatMessage::where('chat_id', $chatId)
            ->orderBy('created_at')
            ->get()
            ->map(function ($msg) use ($user) {
                $isAdmin = $msg->sender_id === $user->id;
                return [
                    'from' => $isAdmin ? 'admin' : 'customer',
                    'text' => $msg->message,
                    'time' => $msg->created_at->format('H:i'),
                    'file_url' => $msg->file_url,
                    'file_name' => $msg->file_name,
                    'file_size_formatted' => $msg->file_size_formatted,
                    'is_image' => $msg->is_image,
                    'is_video' => $msg->is_video,
                    'sender_avatar_url' => $msg->sender_avatar_url,
                    'is_admin' => $isAdmin,
                ];
            })
            ->toArray();

        $this->dispatch('chatMessagesLoaded');
    }

    public function sendMessage()
    {
        $this->validate([
            'message' => 'nullable|string',
            'file' => 'nullable|file|max:20480',
        ]);

        if (!$this->message && !$this->file) {
            $this->dispatch('notify', type: 'warning', message: 'Pesan atau file harus diisi');
            return;
        }

        $this->sending = true;
        $user = auth()->user();

        $chat = Chat::findOrFail($this->activeChatId);
        if (!$chat->admin_id) {
            $chat->update(['admin_id' => $user->id]);
        }

        $filePath = null;
        $fileName = null;
        $fileSize = null;
        $fileType = null;

        if ($this->file) {
            $extension = strtolower($this->file->getClientOriginalExtension());
            $isImage = in_array($extension, ['jpg', 'jpeg', 'png']);
            $filePath = $isImage
                ? app(ImageService::class)->compressAndStore($this->file, 'chat-files')
                : $this->file->store('chat-files', 'public');
            $fileName = $this->file->getClientOriginalName();
            $fileSize = $isImage ? Storage::disk('public')->size($filePath) : $this->file->getSize();
            $fileType = $this->file->getMimeType();
        }

        $message = ChatMessage::create([
            'chat_id' => $chat->id,
            'sender_id' => $user->id,
            'message' => $this->message ?: null,
            'file_path' => $filePath,
            'file_name' => $fileName,
            'file_size' => $fileSize,
            'file_type' => $fileType,
        ]);

        $message->load('sender');

        $newMsg = [
            'from' => 'admin',
            'text' => $message->message,
            'time' => $message->created_at->format('H:i'),
            'file_url' => $message->file_url,
            'file_name' => $message->file_name,
            'file_size_formatted' => $message->file_size_formatted,
            'is_image' => $message->is_image,
            'is_video' => $message->is_video,
            'sender_avatar_url' => $message->sender_avatar_url,
            'is_admin' => true,
        ];

        $this->messages[] = $newMsg;

        // Update sidebar
        $this->chats = collect($this->chats)->map(function ($c) use ($chat, $newMsg) {
            if ($c['id'] == $chat->id) {
                $c['lastMessage'] = $newMsg['text'] ?: '📎 ' . $newMsg['file_name'];
                $c['time'] = $newMsg['time'];
            }
            return $c;
        })->toArray();

        $this->message = '';
        $this->file = null;

        $this->sending = false;

        $this->dispatch('chatMessagesLoaded');
    }

    public function getCurrentChatProperty()
    {
        return collect($this->chats)->firstWhere('id', $this->activeChatId);
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
