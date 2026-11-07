<x-app-layout>
    <div class="max-w-3xl mx-auto w-full">
        
        <div class="mb-6 flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{ route('perawat.antrean') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                
                @if($consultation->user->foto_profil)
                    <img src="{{ Storage::url($consultation->user->foto_profil) }}" alt="Foto" class="w-12 h-12 rounded-full object-cover mr-3 border-2 border-white shadow-sm">
                @else
                    <div class="w-12 h-12 bg-blue-500 text-white rounded-full flex items-center justify-center font-extrabold text-xl mr-3 shadow-sm border-2 border-white">
                        {{ substr($consultation->user->name, 0, 1) }}
                    </div>
                @endif
                
                <div>
                    <h1 class="text-xl font-bold text-sigala-dark">Chat dengan {{ $consultation->user->name }}</h1>
                    <p class="text-xs font-bold text-sigala-blue">{{ $consultation->jenis }}</p>
                    <p class="text-xs text-gray-500">Keluhan: {{ $consultation->keluhan }}</p>
                </div>
            </div>
            <button onclick="selesaikanChat({{ $consultation->id }})" class="px-4 py-2 bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold rounded-lg transition-colors">
                Selesaikan
            </button>
        </div>

        <div class="bg-gray-100 border border-gray-200 rounded-3xl shadow-sm overflow-hidden flex flex-col h-[600px]" x-data="perawatChatApp({{ $consultation->id }})" x-init="init()">
            
            <div class="flex-1 p-6 overflow-y-auto space-y-4" id="chat-container">
                <template x-for="(msg, index) in messages" :key="index">
                    <div class="flex flex-col" :class="msg.sender_id === {{ Auth::id() }} ? 'items-end' : 'items-start'">
                        <div class="max-w-[75%] rounded-2xl px-4 py-3 text-sm shadow-sm" :class="msg.sender_id === {{ Auth::id() }} ? 'bg-sigala-blue text-white rounded-br-sm' : 'bg-white border border-gray-100 text-gray-700 rounded-bl-sm'">
                            <p x-text="msg.message"></p>
                        </div>
                        <span class="text-[10px] text-gray-400 mt-1 mx-1" x-text="formatWaktu(msg.created_at)"></span>
                    </div>
                </template>
            </div>

            <div class="p-4 bg-white border-t border-gray-200 shrink-0">
                <form @submit.prevent="kirimPesan()" class="flex gap-2">
                    <input type="text" x-model="pesanBaru" placeholder="Balas pesan pasien..." class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-sigala-blue bg-gray-50" required>
                    <button type="submit" class="px-6 py-3 bg-sigala-blue text-white font-bold rounded-xl hover:bg-blue-700 transition">Kirim</button>
                </form>
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
                },

                formatWaktu(timestamp) {
                    if (!timestamp) return '';
                    const date = new Date(timestamp);
                    return date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                }
            }
        }

        function selesaikanChat(id) {
            if(confirm('Yakin ingin menyelesaikan konsultasi ini?')) {
                fetch(`/perawat/chat/${id}/finish`, {
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                }).then(() => {
                    window.location.href = "{{ route('perawat.antrean') }}";
                });
            }
        }
    </script>
</x-app-layout>