<x-app-layout>
    <div class="max-w-xl mx-auto w-full p-4" x-data="chatApp({{ $chat->id }}, '{{ $chat->status }}', '{{ $chat->nurse ? $chat->nurse->name : 'S' }}', '{{ $chat->jenis }}')" x-init="init()">
        
        @if($isOffline)
            <div class="flex flex-col items-center justify-center h-[70vh] text-center bg-white rounded-3xl border border-gray-100 shadow-sm p-8 mt-10">
                <div class="w-24 h-24 bg-red-50 text-red-500 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h2 class="text-2xl font-extrabold text-sigala-dark mb-3">Perawat Sedang Offline</h2>
                <p class="text-sm text-gray-500 mb-8 max-w-xs leading-relaxed">Saat ini di luar jam operasional (08:00 - 17:00). Silakan hubungi kembali besok.</p>
                <a href="{{ route('konsultasi.index') }}" class="w-full py-3 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
                    Kembali ke Menu Konsultasi
                </a>
            </div>
        @else
            <div x-show="status === 'menunggu'" class="flex flex-col items-center justify-center h-[70vh] text-center">
                <div class="w-48 h-48 bg-blue-50 rounded-full flex items-center justify-center mb-8 relative">
                    <svg class="w-24 h-24 text-sigala-blue animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h2 class="text-2xl font-extrabold text-sigala-blue mb-3">Anda sedang dihubungkan dengan perawat</h2>
                <p class="text-sm text-gray-500 mb-8 max-w-xs leading-relaxed">Mohon tunggu sebentar, perawat kami sedang meninjau informasi Anda.</p>
                
                <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-6 w-full max-w-xs mb-8">
                    <p class="text-xs text-sigala-blue font-bold mb-2 flex items-center justify-center">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Estimasi Waktu Tunggu
                    </p>
                    <p class="text-2xl font-black text-sigala-dark">1-3 Menit</p>
                </div>

                <button @click="batalkanChat()" class="w-full py-3 border border-gray-300 text-gray-600 font-bold text-sm rounded-xl hover:bg-gray-50 transition">
                    Batal
                </button>
            </div>

            <div x-show="status === 'berlangsung'" class="flex flex-col h-[70vh]">
                <div class="mb-4 flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="{{ route('konsultasi.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </a>
                        <h1 class="text-xl font-bold text-sigala-dark">Ruang Chat</h1>
                    </div>
                    <button @click="akhiriChat()" class="px-4 py-2 bg-red-50 text-red-600 text-xs font-bold rounded-lg">Akhiri</button>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col h-full">
                    <div class="mb-4 pb-4 border-b border-gray-100 flex items-center justify-between">
                        @php
                            $perawat = \App\Models\User::find($chat->nurse_id);
                        @endphp
                        <div class="flex items-center">
                            @if($perawat && $perawat->foto_profil)
                                <img src="{{ Storage::url($perawat->foto_profil) }}" alt="Foto Perawat" class="w-10 h-10 rounded-full object-cover mr-3 border-2 border-white shadow-sm">
                            @else
                                <div class="w-10 h-10 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-3" x-text="nurseInitial"></div>
                            @endif
                            <div>
                                <h3 class="font-bold text-sigala-dark text-sm" x-text="'Perawat ' + nurseName"></h3>
                                <p class="text-[10px] text-teal-600 font-bold">Selesai</p>
                            </div>
                        </div>
                        <button class="w-9 h-9 bg-sigala-blue text-white rounded-full flex items-center justify-center shadow-md">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </button>
                    </div>

                    <div class="flex-1 overflow-y-auto space-y-4 pr-2" id="chat-container">
                        <template x-for="(msg, index) in messages" :key="index">
                            <div class="flex flex-col" :class="msg.sender_id === {{ Auth::id() }} ? 'items-end' : 'items-start'">
                                <div class="max-w-[75%] rounded-2xl px-4 py-3 text-sm" :class="msg.sender_id === {{ Auth::id() }} ? 'bg-sigala-blue text-white' : 'bg-gray-100 text-gray-800'">
                                    <p x-text="msg.message"></p>
                                </div>
                                <div x-show="msg.message.includes('PERINGATAN DARURAT')" class="mt-2">
                                    <a href="tel:119" class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-xs font-bold rounded-lg shadow-md hover:bg-red-700">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        Hubungi 119 Sekarang
                                    </a>
                                </div>
                                <span class="text-[10px] text-gray-400 mt-1 mx-1" x-text="formatWaktu(msg.created_at)"></span>
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

            <div x-show="status === 'selesai'" class="flex flex-col h-[70vh]">
                <div class="mb-4 flex items-center">
                    <a href="{{ route('konsultasi.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </a>
                    <h1 class="text-xl font-bold text-sigala-dark">Riwayat Obrolan</h1>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col h-full">
                    <div class="mb-4 pb-4 border-b border-gray-100 flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold text-lg mr-3" x-text="nurseInitial"></div>
                            <div>
                                <h3 class="font-bold text-sigala-dark text-sm" x-text="'Perawat ' + nurseName"></h3>
                                <p class="text-[10px] text-teal-600 font-bold">Selesai</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 overflow-y-auto space-y-4 pr-2" id="chat-container-history">
                        <template x-for="(msg, index) in messages" :key="index">
                            <div class="flex flex-col" :class="msg.sender_id === {{ Auth::id() }} ? 'items-end' : 'items-start'">
                                <div class="max-w-[75%] rounded-2xl px-4 py-3 text-sm" :class="msg.sender_id === {{ Auth::id() }} ? 'bg-sigala-blue text-white' : 'bg-gray-100 text-gray-800'">
                                    <p x-text="msg.message"></p>
                                </div>
                                <span class="text-[10px] text-gray-400 mt-1 mx-1" x-text="formatWaktu(msg.created_at)"></span>
                            </div>
                        </template>
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <a href="{{ route('konsultasi.index') }}" class="block w-full py-3 bg-gray-100 text-gray-700 font-bold text-sm rounded-xl text-center hover:bg-gray-200 transition">
                            Kembali ke Menu Konsultasi
                        </a>
                    </div>
                </div>
            </div>
        @endif

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
                        const container = document.getElementById('chat-container') || document.getElementById('chat-container-history');
                        if (container) container.scrollTop = container.scrollHeight;
                    }, 100);
                },

                formatWaktu(timestamp) {
                    if (!timestamp) return '';
                    const date = new Date(timestamp);
                    return date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                },

                batalkanChat() {
                    if(confirm('Batalkan konsultasi ini?')) {
                        fetch(`/konsultasi/${this.chatId}/finish`, {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                        }).then(() => {
                            window.location.href = "{{ route('konsultasi.index') }}";
                        });
                    }
                },

                akhiriChat() {
                    if(confirm('Akhiri konsultasi?')) {
                        fetch(`/konsultasi/${this.chatId}/finish`, {
                            method: 'POST',
                            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                        }).then(() => {
                            window.location.href = "{{ route('konsultasi.index') }}";
                        });
                    }
                }
            }
        }
    </script>
</x-app-layout>