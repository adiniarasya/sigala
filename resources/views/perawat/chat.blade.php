<x-app-layout>
    <div class="max-w-3xl mx-auto w-full">
        
        <div class="mb-6 flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('perawat.antrean') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <div>
                    <h1 class="text-xl font-bold text-sigala-dark">Chat dengan {{ $consultation->user->name }}</h1>
                    <p class="text-xs font-bold text-sigala-blue mb-1">{{ $consultation->jenis }}</p>
<p class="text-xs text-gray-500">Keluhan: {{ $consultation->keluhan }}</p>
                </div>
            </div>
            <button onclick="selesaikanChat({{ $consultation->id }})" class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold rounded-lg transition-colors">
                Selesaikan
            </button>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden flex flex-col h-[600px]" x-data="perawatChatApp({{ $consultation->id }})" x-init="init()">
            
            <div class="flex-1 p-6 overflow-y-auto space-y-4 bg-gray-50/50" id="chat-container">
                <template x-for="(msg, index) in messages" :key="index">
                    <div class="flex" :class="msg.sender_id === {{ Auth::id() }} ? 'justify-end' : 'justify-start'">
                        <div class="max-w-[75%] rounded-2xl px-4 py-3 text-sm" :class="msg.sender_id === {{ Auth::id() }} ? 'bg-sigala-blue text-white rounded-br-sm' : 'bg-white border border-gray-100 text-gray-700 rounded-bl-sm shadow-sm'">
                            <p x-text="msg.message"></p>
                        </div>
                    </div>
                </template>
            </div>

            <div class="p-4 bg-white border-t border-gray-100 shrink-0">
                <div class="flex items-center bg-gray-50 border border-gray-200 rounded-full px-4 py-2 focus-within:ring-2 focus-within:ring-sigala-blue/20 transition-all">
                    <input type="text" x-model="pesanBaru" @keydown.enter="kirimPesan()" placeholder="Balas pesan pasien..." class="flex-1 bg-transparent border-none outline-none text-sm text-sigala-dark focus:ring-0">
                    <button @click="kirimPesan()" class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                        <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function perawatChatApp(chatId) {
            return {
                chatId: chatId,
                pesanBaru: '',
                messages: [],
                pollingInterval: null,

                init() {
                    this.fetchMessages();
                    this.pollingInterval = setInterval(() => {
                        this.fetchMessages();
                    }, 3000);
                },

                fetchMessages() {
                    fetch(`/konsultasi/${this.chatId}/messages`)
                        .then(res => res.json())
                        .then(data => {
                            this.messages = data;
                            this.scrollToBottom();
                        });
                },

                kirimPesan() {
                    if (this.pesanBaru.trim() === '') return;
                    let text = this.pesanBaru;
                    this.pesanBaru = '';

                    fetch(`/konsultasi/${this.chatId}/send`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ message: text })
                    }).then(() => {
                        this.fetchMessages();
                    });
                },

                scrollToBottom() {
                    setTimeout(() => {
                        const container = document.getElementById('chat-container');
                        if (container) container.scrollTop = container.scrollHeight;
                    }, 100);
                }
            }
        }

        function selesaikanChat(id) {
            if(confirm('Yakin ingin menyelesaikan konsultasi ini?')) {
                fetch(`/konsultasi/${id}/finish`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                }).then(() => {
                    window.location.href = "{{ route('perawat.antrean') }}";
                });
            }
        }
    </script>
</x-app-layout>