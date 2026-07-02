<?php

namespace App\Http\Controllers\Internal;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('internal.chat');
    }

    public function unreadCount()
    {
        $user = auth()->user();
        $chatIds = Chat::where(function ($q) use ($user) {
            $q->where('admin_id', $user->id)->orWhereNull('admin_id');
        })->pluck('id');

        $count = ChatMessage::whereIn('chat_id', $chatIds)
            ->where('sender_id', '!=', $user->id)
            ->where('is_read', false)
            ->count();

        return response()->json(['count' => $count]);
    }
}
