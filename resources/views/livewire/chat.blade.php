<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden" style="height: calc(100vh - 10rem);">
    <div class="flex h-full">
        {{-- Left: Chat List --}}
        <div class="w-64 shrink-0 border-r border-gray-200 flex flex-col">
            <div class="p-4 border-b border-gray-100">
                <h2 class="font-bold text-gray-900 text-sm">Percakapan</h2>
            </div>
            <div class="flex-1 overflow-y-auto">
                @forelse($chats as $chat)
                <button wire:click="loadMessages({{ $chat['id'] }})" wire:key="chat-{{ $chat['id'] }}"
                    class="w-full text-left p-4 transition-colors border-b border-gray-50
                        {{ $activeChatId === $chat['id'] ? 'bg-blue-50 border-l-4 border-[#1a237e]' : 'hover:bg-gray-50 border-l-4 border-transparent' }}">
                    <div class="flex items-start gap-3">
                        <div class="relative shrink-0">
                            <div class="w-9 h-9 rounded-full bg-[#1a237e]/10 flex items-center justify-center text-[#1a237e] font-bold text-sm">
                                <span>{{ substr($chat['name'], 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between">
                                <span class="font-semibold text-xs text-gray-900 truncate">{{ $chat['name'] }}</span>
                                <span class="text-xs text-gray-400 shrink-0">{{ $chat['time'] }}</span>
                            </div>
                            <p class="text-xs text-gray-500 truncate mt-0.5">{{ $chat['lastMessage'] }}</p>
                        </div>
                        @if($chat['unread'] > 0)
                        <span class="shrink-0 bg-[#1a237e] text-white text-xs font-bold px-1.5 py-0.5 rounded-full">{{ $chat['unread'] }}</span>
                        @endif
                    </div>
                </button>
                @empty
                <div class="p-4 text-center text-gray-400 text-sm">Belum ada percakapan</div>
                @endforelse
            </div>
        </div>

        {{-- Right: Chat Window --}}
        <div class="flex-1 flex flex-col bg-gray-50" x-data="chatWindow()" x-init="init()" wire:ignore.self>
            @if(!$activeChatId)
            <div class="flex-1 flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <p class="text-gray-500 font-medium text-sm">Pilih percakapan</p>
                    <p class="text-gray-400 text-xs mt-1">Klik chat di kiri untuk mulai</p>
                </div>
            </div>
            @else
            <div class="flex-1 flex flex-col min-h-0">
                <div class="bg-white border-b border-gray-200 px-6 py-3.5 flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-[#1a237e]/10 flex items-center justify-center text-[#1a237e] font-bold text-sm shrink-0">
                        <span>{{ substr($this->currentChat['name'] ?? '?', 0, 1) }}</span>
                    </div>
                    <div>
                        <p class="font-semibold text-gray-900 text-sm">{{ $this->currentChat['name'] ?? 'Unknown' }}</p>
                        <p class="text-xs text-gray-400">Offline</p>
                    </div>
                </div>

                <div x-ref="messages" class="flex-1 overflow-y-auto min-h-0 px-6 py-4 space-y-3">
                    @foreach($messages as $msg)
                    <div class="flex {{ $msg['from'] === 'admin' ? 'justify-end' : 'justify-start' }}">
                        <div class="max-w-[70%] px-4 py-2.5 rounded-2xl shadow-sm space-y-1.5
                            {{ $msg['from'] === 'admin' ? 'bg-[#1a237e] text-white rounded-br-none' : 'bg-white text-gray-900 border border-gray-200 rounded-bl-none' }}">
                            @if($msg['file_url'])
                            <div>
                                @if($msg['is_image'])
                                <a href="{{ $msg['file_url'] }}" target="_blank" class="block -mx-1 -mt-1">
                                    <img src="{{ $msg['file_url'] }}" class="max-w-full rounded-xl max-h-60 object-cover">
                                </a>
                                @elseif($msg['is_video'])
                                <video src="{{ $msg['file_url'] }}" controls class="max-w-full rounded-xl max-h-60"></video>
                                @else
                                <a href="{{ $msg['file_url'] }}" target="_blank" class="flex items-center gap-3 p-3 rounded-xl transition-colors {{ $msg['from'] === 'admin' ? 'bg-[#1a237e] hover:bg-[#283593]' : 'bg-gray-100 hover:bg-gray-200' }}">
                                    <div class="w-10 h-10 rounded-lg flex items-center justify-center shrink-0 {{ $msg['from'] === 'admin' ? 'bg-[#283593]' : 'bg-blue-100' }}">
                                        <svg class="w-5 h-5 {{ $msg['from'] === 'admin' ? 'text-white' : 'text-blue-900' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium truncate {{ $msg['from'] === 'admin' ? 'text-blue-100' : 'text-gray-900' }}">{{ $msg['file_name'] }}</p>
                                        <p class="text-xs {{ $msg['from'] === 'admin' ? 'text-blue-200' : 'text-gray-400' }}">{{ $msg['file_size_formatted'] }}</p>
                                    </div>
                                    <svg class="w-4 h-4 shrink-0 {{ $msg['from'] === 'admin' ? 'text-blue-200' : 'text-gray-400' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                </a>
                                @endif
                            </div>
                            @endif
                            @if($msg['text'])
                            <p class="text-sm leading-relaxed">{{ $msg['text'] }}</p>
                            @endif
                            <p class="text-xs {{ $msg['from'] === 'admin' ? 'text-blue-200' : 'text-gray-400' }}">{{ $msg['time'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="bg-white border-t border-gray-200 px-6 py-4">
                    <form wire:submit="sendMessage" class="flex items-center gap-3">
                        <input type="text" wire:model="message" placeholder="Tulis pesan ke customer..." class="flex-1 px-4 py-2.5 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#1a237e]/30 focus:border-[#1a237e]/50 transition-shadow">
                        <button type="submit" wire:loading.attr="disabled" class="text-white p-2.5 rounded-xl transition-colors bg-[#1a237e] hover:bg-[#1a237e]/90 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg wire:loading.remove wire:target="sendMessage" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 19V5m0 0l-7 7m7-7l7 7"/></svg>
                            <svg wire:loading wire:target="sendMessage" class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/></svg>
                        </button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
function chatWindow() {
    return {
        init() {
            this.$nextTick(() => this.scrollToBottom());
            window.addEventListener('chatMessagesLoaded', () => {
                this.$nextTick(() => this.scrollToBottom());
            });
        },
        scrollToBottom() {
            const el = this.$refs.messages;
            if (el) el.scrollTop = el.scrollHeight;
        },
    };
}
</script>
