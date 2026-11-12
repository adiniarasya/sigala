<x-app-layout>
    <div class="max-w-4xl mx-auto w-full pb-24">
        
        <div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center">
                <a href="{{ route('perawat.antrean') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm hover:bg-gray-50 transition shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                @if($consultation->user->foto_profil)
                    <img src="{{ Storage::url($consultation->user->foto_profil) }}" alt="Foto" class="w-12 h-12 rounded-full object-cover mr-3 border-2 border-white shadow-sm shrink-0">
                @else
                    <div class="w-12 h-12 bg-blue-100 text-sigala-blue rounded-full flex items-center justify-center font-extrabold text-xl mr-3 shadow-sm border border-blue-200 shrink-0">
                        {{ substr($consultation->user->name, 0, 1) }}
                    </div>
                @endif
                <div>
                    <h1 class="text-lg sm:text-xl font-bold text-sigala-dark">Chat dengan {{ $consultation->user->name }}</h1>
                    <p class="text-xs text-gray-500 mt-0.5">Keluhan: <span class="font-bold text-sigala-blue">{{ $consultation->keluhan }}</span></p>
                </div>
            </div>
            <button onclick="selesaikanChat({{ $consultation->id }})" class="px-5 py-2.5 bg-red-50 text-red-600 border border-red-100 text-sm font-bold rounded-xl hover:bg-red-100 transition flex items-center justify-center shrink-0">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                Selesaikan
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <div class="md:col-span-1 space-y-4">
                <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
                    <div class="flex flex-col items-center text-center mb-6">
                        @if($consultation->user->foto_profil)
                            <img src="{{ Storage::url($consultation->user->foto_profil) }}" class="w-20 h-20 rounded-full object-cover border-4 border-blue-50 shadow-sm mb-3">
                        @else
                            <div class="w-20 h-20 bg-blue-50 text-sigala-blue rounded-full flex items-center justify-center font-extrabold text-2xl border-4 border-white shadow-sm mb-3">
                                {{ substr($consultation->user->name, 0, 1) }}
                            </div>
                        @endif
                        <h3 class="font-bold text-sigala-dark">{{ $consultation->user->name }}</h3>
                        <p class="text-xs text-gray-500">{{ $consultation->user->email }}</p>
                    </div>

                    <div class="space-y-3 pt-4 border-t border-gray-50">
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Gol. Darah</span>
                            <span class="font-bold text-sigala-dark">{{ $consultation->user->golongan_darah ?? '-' }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Alergi</span>
                            <span class="font-bold text-red-500">{{ $consultation->user->alergi ?? 'Tidak ada' }}</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500">Riwayat Penyakit</span>
                            <span class="font-bold text-sigala-dark">{{ $consultation->user->riwayat_penyakit ?? 'Tidak ada' }}</span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 border border-blue-100 rounded-3xl p-5">
                    <h4 class="font-bold text-sigala-blue text-sm mb-2">Catatan Konsultasi</h4>
                    <p class="text-xs text-sigala-dark leading-relaxed">Berikan instruksi yang jelas dan pastikan pasien memahami langkah selanjutnya.</p>
                </div>
            </div>

            <div class="md:col-span-2 flex flex-col bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden" style="height: 600px;">
                
                <div class="flex-1 p-5 overflow-y-auto space-y-4 bg-gray-50/50" id="chat-container">
                    <template x-for="(msg, index) in messages" :key="index">
                        <div class="flex flex-col" :class="msg.sender_id === {{ Auth::id() }} ? 'items-end' : 'items-start'">
                            <span class="text-[10px] text-gray-500 mb-1 mx-1" x-text="msg.sender_id === {{ Auth::id() }} ? 'Anda' : '{{ $consultation->user->name }}'"></span>
                            <div class="max-w-[85%] rounded-2xl px-4 py-3 text-sm shadow-sm" :class="msg.sender_id === {{ Auth::id() }} ? 'bg-sigala-blue text-white rounded-br-sm' : 'bg-white border border-gray-100 text-gray-700 rounded-bl-sm'">
                                <p x-text="msg.message"></p>
                            </div>
                            <span class="text-[9px] text-gray-400 mt-1 mx-1" x-text="formatWaktu(msg.created_at)"></span>
                        </div>
                    </template>
                </div>

                <div class="p-4 bg-white border-t border-gray-100 shrink-0">
                    <form @submit.prevent="kirimPesan()" class="flex gap-2">
                        <input type="text" x-model="pesanBaru" placeholder="Ketik balasan untuk pasien..." class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-sigala-blue bg-gray-50 text-sm" required>
                        <button type="submit" class="px-6 py-3 bg-sigala-blue text-white font-bold rounded-xl hover:bg-blue-700 transition text-sm">Kirim</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
        function perawatChatApp(chatId) {
            return {
                chatId: chatId,
                pesanBaru: '',
                messages: [],
                init() {
                    this.fetchMessages();
                    setInterval(() => this.fetchMessages(), 3000);
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