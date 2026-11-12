<x-app-layout>
    <div class="max-w-xl mx-auto w-full relative pb-24" x-data="{ 
        step: 1, 
        showAiChat: false, 
        messages: [{sender: 'ai', text: 'Halo! Saya Siggy, Asisten SIGALA. Ada yang bisa saya bantu terkait edukasi bencana?'}], 
        newMessage: '',
        isLoading: false,
        kirimPesan() {
            if (this.newMessage.trim() === '' || this.isLoading) return;
            
            let userMessage = this.newMessage;
            this.messages.push({ sender: 'user', text: userMessage });
            this.newMessage = '';
            this.isLoading = true;
            this.messages.push({ sender: 'ai', text: 'Sedang mengetik...' });

            fetch('{{ route('ai.chat') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ message: userMessage })
            })
            .then(res => res.json())
            .then(data => {
                this.messages.pop();
                this.messages.push({ sender: 'ai', text: data.reply });
                this.isLoading = false;
                this.scrollToBottom();
            })
            .catch(() => {
                this.messages.pop();
                this.messages.push({ sender: 'ai', text: 'Maaf, terjadi kesalahan koneksi.' });
                this.isLoading = false;
                this.scrollToBottom();
            });
        },
        scrollToBottom() {
            setTimeout(() => {
                const container = document.getElementById('ai-chat-container');
                if (container) container.scrollTop = container.scrollHeight;
            }, 100);
        },
        renderMarkdown(text) {
            if (!text) return '';
            return marked.parse(text);
        }
    }">
        
        <div x-show="step === 1" x-transition class="flex flex-col justify-center text-center">
            <div class="w-full max-w-sm mx-auto bg-blue-50 rounded-3xl mb-6 flex items-center justify-center relative overflow-hidden border border-blue-100 p-4">
                <img src="{{ asset('images/edukasi-tas-siaga.png') }}" alt="Ilustrasi Tas Siaga" class="w-full h-auto max-h-[35vh] object-contain">
            </div>
            
            <h1 class="text-2xl font-extrabold text-sigala-blue mb-3 px-4">Bersama, kita lebih siap menghadapi bencana.</h1>
            <p class="text-sm text-gray-500 mb-6 px-4 leading-relaxed">Tetap waspada, saling membantu, dan ikuti informasi resmi untuk keselamatan bersama.</p>
            
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 mb-6 mx-4">
                <p class="text-sm font-bold text-sigala-blue italic">"Kesiapsiagaan hari ini, keselamatan di masa depan."</p>
            </div>

            <div class="px-4 mt-2">
                <button @click="step = 2" class="w-full py-3.5 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex items-center justify-center">
                    Lanjutkan <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </div>

        <div x-show="step === 2" x-transition class="mt-2">
            <div class="flex items-center mb-4 px-2">
                <button @click="step = 1" class="text-gray-500 mr-4 bg-white p-2 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <h1 class="text-xl font-bold text-sigala-dark">Siaga Edukasi</h1>
            </div>

            <p class="text-sm text-gray-500 mb-4 px-2">Tingkatkan pengetahuan Anda tentang bencana dan kesehatan.</p>

            <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden mb-6 mx-2">
                <div class="divide-y divide-gray-100">
                    <a href="{{ route('edukasi.show', 'gempa-bumi') }}" class="flex items-center p-4 hover:bg-gray-50 transition">
                        <div class="w-10 h-10 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center mr-4 text-xl">⚡</div>
                        <span class="font-bold text-sm text-sigala-dark flex-1">Gempa Bumi</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <a href="{{ route('edukasi.show', 'banjir') }}" class="flex items-center p-4 hover:bg-gray-50 transition">
                        <div class="w-10 h-10 bg-blue-50 text-sigala-blue rounded-xl flex items-center justify-center mr-4 text-xl">🌊</div>
                        <span class="font-bold text-sm text-sigala-dark flex-1">Banjir</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <a href="{{ route('edukasi.show', 'tsunami') }}" class="flex items-center p-4 hover:bg-gray-50 transition">
                        <div class="w-10 h-10 bg-cyan-50 text-cyan-500 rounded-xl flex items-center justify-center mr-4 text-xl">🌀</div>
                        <span class="font-bold text-sm text-sigala-dark flex-1">Tsunami</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <a href="{{ route('edukasi.show', 'tanah-longsor') }}" class="flex items-center p-4 hover:bg-gray-50 transition">
                        <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center mr-4 text-xl">⛰️</div>
                        <span class="font-bold text-sm text-sigala-dark flex-1">Tanah Longsor</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                    <a href="#" class="flex items-center p-4 hover:bg-gray-50 transition opacity-50 cursor-not-allowed">
                        <div class="w-10 h-10 bg-red-50 text-red-500 rounded-xl flex items-center justify-center mr-4 text-xl">🌋</div>
                        <span class="font-bold text-sm text-sigala-dark flex-1">Erupsi Gunung Berapi</span>
                        <span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-1 rounded">Segera</span>
                    </a>
                    <a href="#" class="flex items-center p-4 hover:bg-gray-50 transition opacity-50 cursor-not-allowed">
                        <div class="w-10 h-10 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center mr-4 text-xl">🔥</div>
                        <span class="font-bold text-sm text-sigala-dark flex-1">Kebakaran</span>
                        <span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-1 rounded">Segera</span>
                    </a>
                    <a href="#" class="flex items-center p-4 hover:bg-gray-50 transition opacity-50 cursor-not-allowed">
                        <div class="w-10 h-10 bg-blue-50 text-blue-500 rounded-xl flex items-center justify-center mr-4 text-xl">🏥</div>
                        <span class="font-bold text-sm text-sigala-dark flex-1">Kesehatan di Pengungsian</span>
                        <span class="text-[10px] bg-gray-100 text-gray-500 px-2 py-1 rounded">Segera</span>
                    </a>
                    <a href="{{ route('pertolongan.index') }}" class="flex items-center p-4 hover:bg-gray-50 transition">
                        <div class="w-10 h-10 bg-red-50 text-red-500 rounded-xl flex items-center justify-center mr-4 text-xl">🩹</div>
                        <span class="font-bold text-sm text-sigala-dark flex-1">Pertolongan Pertama</span>
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>

            <div class="mt-6 pb-20 px-2">
                <a href="{{ route('edukasi.bantuan-darurat') }}" class="block w-full py-3.5 border-2 border-red-500 text-red-600 font-bold rounded-xl text-center hover:bg-red-50 transition">
                    Butuh Bantuan Darurat?
                </a>
            </div>
        </div>

        <div x-show="step === 2" class="fixed bottom-24 right-6 z-40 flex flex-col items-center">
            <button @click="showAiChat = true" class="w-16 h-16 bg-white rounded-full shadow-lg shadow-blue-300 flex items-center justify-center hover:scale-110 transition-transform animate-bounce border-2 border-blue-100 p-1 overflow-hidden">
                <img src="{{ asset('images/siggy.png') }}" alt="Asisten AI" class="w-full h-full object-cover rounded-full">
            </button>
            <span class="mt-1 text-[10px] font-bold text-sigala-blue bg-white/80 px-2 py-0.5 rounded-md shadow-sm">Tanya AI</span>
        </div>

        <div x-show="showAiChat" x-transition class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
            
            <div @click.away="showAiChat = false" class="w-full max-w-md rounded-3xl shadow-2xl flex flex-col relative overflow-hidden border border-gray-200 bg-white" style="height: 75vh; max-height: 600px;">
                
                <div class="bg-sigala-blue p-4 flex items-center justify-between text-white shrink-0 rounded-t-3xl z-20 shadow-sm relative">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-3 overflow-hidden p-0.5 shadow-sm shrink-0">
                            <img src="{{ asset('images/siggy.png') }}" alt="Siggy" class="w-full h-full object-cover rounded-full">
                        </div>
                        <div>
                            <h3 class="font-bold text-sm">Siggy Asisten SIGALA</h3>
                            <p class="text-[10px] text-blue-100">Tanya jawab seputar bencana</p>
                        </div>
                    </div>
                    <button @click="showAiChat = false" class="text-white hover:text-red-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <div class="flex-1 p-4 space-y-4 relative" id="ai-chat-container" style="overflow-y: scroll; min-height: 0; background-color: #f8fafc;">
                    
                    <div class="fixed inset-0 pointer-events-none z-0" style="background-image: url('{{ asset('images/siggy.png') }}'); background-size: 70%; background-position: center; background-repeat: no-repeat; opacity: 0.1; filter: blur(4px);"></div>

                    <div class="relative z-10 space-y-4">
                        <template x-for="(msg, index) in messages" :key="index">
                            <div class="flex flex-col" :class="msg.sender === 'user' ? 'items-end' : 'items-start'">
                                <span class="text-[10px] text-gray-600 font-bold mb-1 mx-1 bg-white/80 px-2 rounded backdrop-blur-sm" x-text="msg.sender === 'user' ? 'Anda' : 'Siggy'"></span>
                                
                                <div class="max-w-[85%] rounded-2xl px-4 py-3 text-sm shadow-md border" 
                                     :class="msg.sender === 'user' 
                                        ? 'bg-sigala-blue text-white border-blue-700 rounded-br-sm' 
                                        : 'bg-white border-l-4 border-l-sigala-blue border-gray-200 text-gray-800 rounded-bl-sm'">
                                    <div class="prose prose-sm max-w-none break-words" x-html="msg.sender === 'ai' ? renderMarkdown(msg.text) : msg.text"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="p-4 bg-white border-t border-gray-200 shrink-0 rounded-b-3xl z-20 relative">
                    <form @submit.prevent="kirimPesan()" class="flex gap-2">
                        <input type="text" x-model="newMessage" placeholder="Tanya sesuatu ke Siggy..." class="flex-1 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:border-sigala-blue bg-gray-50 shadow-sm text-sm">
                        <button type="submit" :disabled="isLoading" class="px-6 py-3 bg-sigala-blue text-white font-bold rounded-xl hover:bg-blue-700 transition disabled:opacity-50 shadow-sm">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    
    <style>
        #ai-chat-container::-webkit-scrollbar { width: 6px; }
        #ai-chat-container::-webkit-scrollbar-track { background: transparent; }
        #ai-chat-container::-webkit-scrollbar-thumb { background: rgba(148, 163, 184, 0.5); border-radius: 8px; }
        
        .prose p { margin-bottom: 8px; line-height: 1.5; }
        .prose p:last-child { margin-bottom: 0; }
        .prose strong { font-weight: bold; color: #1e3a8a; }
        .prose ul { list-style-type: disc; padding-left: 20px; margin-bottom: 8px; }
        .prose ol { list-style-type: decimal; padding-left: 20px; margin-bottom: 8px; }
    </style>
</x-app-layout>