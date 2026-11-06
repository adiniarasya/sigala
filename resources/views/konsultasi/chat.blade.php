<x-app-layout>
    <div class="max-w-xl mx-auto w-full p-4" x-data="chatApp({{ $chat->id }}, '{{ $chat->status }}', '{{ $chat->nurse ? $chat->nurse->name : 'S' }}', '{{ $chat->jenis }}')" x-init="init()">
        
        <div x-show="status !== 'selesai'">
            <div class="mb-4 flex items-center">
                <a href="{{ route('konsultasi.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark">Ruang Chat</h1>
            </div>

            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col h-[70vh]">
                <div class="mb-4 pb-4 border-b border-gray-100 flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-3" x-text="nurseInitial"></div>
                        <div>
                            <h3 class="font-bold text-sigala-dark text-sm" x-text="'Perawat ' + nurseName"></h3>
                            <p class="text-[10px] text-teal-600 font-bold" x-text="jenisKonsultasi"></p>
                        </div>
                    </div>
                    <div>
                        <span class="text-xs font-bold px-3 py-1.5 rounded-lg" :class="status === 'menunggu' ? 'bg-orange-50 text-orange-600' : 'bg-teal-50 text-teal-600'" x-text="status.toUpperCase()"></span>
                    </div>
                </div>

                <div class="flex-1 overflow-y-auto space-y-4 pr-2" id="chat-container">
                    <template x-for="(msg, index) in messages" :key="index">
                        <div class="flex" :class="msg.sender_id === {{ Auth::id() }} ? 'justify-end' : 'justify-start'">
                            <div class="max-w-[75%] rounded-2xl px-4 py-3 text-sm" :class="msg.sender_id === {{ Auth::id() }} ? 'bg-sigala-blue text-white' : 'bg-gray-100 text-gray-800'">
                                <p x-text="msg.message"></p>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="mt-4 pt-4 border-t border-gray-100">
                    <form @submit.prevent="kirimPesan()" class="flex gap-2">
                        <input type="text" x-model="pesanBaru" placeholder="Tulis pesan..." class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-sigala-blue bg-gray-50" required>
                        <button type="submit" class="px-6 py-3 bg-sigala-blue text-white font-bold rounded-xl hover:bg-blue-700 transition">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

        <div x-show="status === 'selesai'" class="bg-white p-10 rounded-3xl shadow-sm border border-gray-100 text-center">
            <div class="w-20 h-20 bg-teal-50 text-teal-500 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <h2 class="text-2xl font-bold text-sigala-dark mb-2">Konsultasi Selesai</h2>
            <p class="text-gray-500 mb-8">Terima kasih telah berkonsultasi dengan perawat kami. Semoga lekas sembuh!</p>
            <a href="{{ route('konsultasi.index') }}" class="inline-block px-8 py-3 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
                Kembali ke Menu Konsultasi
            </a>
        </div>

    </div>

    <script>
        function chatApp(chatId, initialStatus, initialNurseName, jenisKonsultasi) {
            return {
                chatId: chatId,
                status: initialStatus,
                nurseName: initialNurseName,
                jenisKonsultasi: jenisKonsultasi,
                pesanBaru: '',
                messages: [],
                pollingInterval: null,

                get nurseInitial() {
                    return this.nurseName ? this.nurseName.charAt(0) : 'S';
                },
                
                init() {
                    this.fetchMessages();
                    this.pollingInterval = setInterval(() => {
                        this.fetchMessages();
                        this.checkStatus();
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

                checkStatus() {
                    fetch(`/konsultasi/${this.chatId}/status`)
                        .then(res => res.json())
                        .then(data => {
                            if (data.status !== this.status) {
                                this.status = data.status;
                                if (this.status === 'selesai') {
                                    clearInterval(this.pollingInterval);
                                }
                            }
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
    </script>
</x-app-layout>