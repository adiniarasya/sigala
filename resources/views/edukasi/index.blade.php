<x-app-layout>
    <div class="max-w-xl mx-auto w-full relative" x-data="{ step: 1, showAiChat: false, messages: [{sender: 'ai', text: 'Halo! Saya Asisten SIGALA. Ada yang bisa saya bantu terkait edukasi bencana?'}], newMessage: '' }">
        
        <div x-show="step === 1" x-transition class="flex flex-col min-h-[85vh] justify-center text-center">
            <div class="w-full h-64 bg-blue-50 rounded-3xl mb-8 flex items-center justify-center relative overflow-hidden border border-blue-100">
                <img src="https://img.freepik.com/free-vector/flood-concept-illustration_114360-1191.jpg" alt="Bencana" class="w-full h-full object-cover mix-blend-multiply opacity-80">
            </div>
            
            <h1 class="text-2xl font-extrabold text-sigala-blue mb-4">Bersama, kita lebih siap menghadapi bencana.</h1>
            <p class="text-sm text-gray-500 mb-8 px-4 leading-relaxed">Tetap waspada, saling membantu, dan ikuti informasi resmi untuk keselamatan bersama.</p>
            
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 mb-8 mx-4">
                <p class="text-sm font-bold text-sigala-blue italic">"Kesiapsiagaan hari ini, keselamatan di masa depan."</p>
            </div>

            <div class="mt-auto px-4">
                <button @click="step = 2" class="w-full py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex items-center justify-center">
                    Lanjutkan <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </div>

        <div x-show="step === 2" x-transition class="mt-6">
            <div class="flex items-center mb-6">
                <button @click="step = 1" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <h1 class="text-xl font-bold text-sigala-dark">Siaga Edukasi</h1>
            </div>

            <p class="text-sm text-gray-500 mb-6">Tingkatkan pengetahuan Anda tentang bencana dan kesehatan.</p>

            <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden mb-6">
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

            <div class="mt-8 mb-20">
                <a href="{{ route('edukasi.bantuan-darurat') }}" class="block w-full py-3.5 border-2 border-red-500 text-red-600 font-bold rounded-xl text-center hover:bg-red-50 transition">
                    Butuh Bantuan Darurat?
                </a>
            </div>
        </div>

        <div x-show="step === 2" class="fixed bottom-24 right-6 z-40">
            <button @click="showAiChat = true" class="w-16 h-16 bg-sigala-blue text-white rounded-full shadow-lg shadow-blue-300 flex items-center justify-center hover:scale-110 transition-transform animate-bounce">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </button>
        </div>

        <div x-show="showAiChat" x-transition class="fixed inset-0 bg-black/50 z-50 flex items-end justify-center sm:items-center p-4">
            <div @click.away="showAiChat = false" class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden flex flex-col h-[70vh]">
                
                <div class="bg-sigala-blue p-4 flex items-center justify-between text-white shrink-0">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center mr-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm">Asisten SIGALA</h3>
                            <p class="text-[10px] text-blue-100">Tanya jawab seputar bencana</p>
                        </div>
                    </div>
                    <button @click="showAiChat = false" class="text-white hover:text-red-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <div class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-50" id="ai-chat-container">
                    <template x-for="(msg, index) in messages" :key="index">
                        <div class="flex" :class="msg.sender === 'user' ? 'justify-end' : 'justify-start'">
                            <div class="max-w-[80%] rounded-2xl px-4 py-3 text-sm" :class="msg.sender === 'user' ? 'bg-sigala-blue text-white rounded-br-sm' : 'bg-white border border-gray-100 text-gray-700 rounded-bl-sm shadow-sm'">
                                <p x-text="msg.text"></p>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="p-4 bg-white border-t border-gray-100 shrink-0">
                    <form @submit.prevent="if(newMessage.trim() !== '') { messages.push({sender: 'user', text: newMessage}); newMessage = ''; setTimeout(() => { messages.push({sender: 'ai', text: 'Maaf, saya masih dalam tahap pengembangan. Fitur AI akan segera hadir!'}); }, 1000); }" class="flex gap-2">
                        <input type="text" x-model="newMessage" placeholder="Tanya sesuatu..." class="flex-1 px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:border-sigala-blue bg-gray-50">
                        <button type="submit" class="px-6 py-3 bg-sigala-blue text-white font-bold rounded-xl hover:bg-blue-700 transition">Kirim</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>