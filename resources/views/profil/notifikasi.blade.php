<x-app-layout>
    <div class="max-w-xl mx-auto w-full pb-24">
        <div class="mb-6 flex items-center">
            <a href="{{ route('profil') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm hover:bg-gray-50 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Notifikasi</h1>
        </div>
        
        <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden" x-data="notifApp()">
            <div class="p-6 space-y-6">
                
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-sigala-dark text-sm">Peringatan Dini Bencana</h4>
                        <p class="text-xs text-gray-500 mt-1">Dapatkan notifikasi jika ada peringatan di sekitar Anda.</p>
                    </div>
                    <button @click="toggle('bencana')" :class="settings.bencana ? 'bg-sigala-blue' : 'bg-gray-200'" class="w-12 h-7 rounded-full relative transition-colors duration-300 ease-in-out focus:outline-none shrink-0 border-2 border-transparent">
                        <span :class="settings.bencana ? 'translate-x-5' : 'translate-x-0.5'" class="absolute top-0.5 left-0 bg-white w-5 h-5 rounded-full transition-transform duration-300 ease-in-out shadow-md block"></span>
                    </button>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-sigala-dark text-sm">Pengingat Tas Siaga</h4>
                        <p class="text-xs text-gray-500 mt-1">Ingatkan saya untuk mengecek tas siaga tiap 3 bulan.</p>
                    </div>
                    <button @click="toggle('tas')" :class="settings.tas ? 'bg-sigala-blue' : 'bg-gray-200'" class="w-12 h-7 rounded-full relative transition-colors duration-300 ease-in-out focus:outline-none shrink-0 border-2 border-transparent">
                        <span :class="settings.tas ? 'translate-x-5' : 'translate-x-0.5'" class="absolute top-0.5 left-0 bg-white w-5 h-5 rounded-full transition-transform duration-300 ease-in-out shadow-md block"></span>
                    </button>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-bold text-sigala-dark text-sm">Promo & Info SIGALA</h4>
                        <p class="text-xs text-gray-500 mt-1">Dapatkan info fitur baru dan tips kesiapsiagaan.</p>
                    </div>
                    <button @click="toggle('promo')" :class="settings.promo ? 'bg-sigala-blue' : 'bg-gray-200'" class="w-12 h-7 rounded-full relative transition-colors duration-300 ease-in-out focus:outline-none shrink-0 border-2 border-transparent">
                        <span :class="settings.promo ? 'translate-x-5' : 'translate-x-0.5'" class="absolute top-0.5 left-0 bg-white w-5 h-5 rounded-full transition-transform duration-300 ease-in-out shadow-md block"></span>
                    </button>
                </div>

            </div>
        </div>
    </div>

    <script>
        function notifApp() {
            return {
                settings: {
                    bencana: localStorage.getItem('notif_bencana') === 'true',
                    tas: localStorage.getItem('notif_tas') === 'true',
                    promo: localStorage.getItem('notif_promo') === 'true'
                },
                toggle(key) {
                    this.settings[key] = !this.settings[key];
                    localStorage.setItem('notif_' + key, this.settings[key]);
                }
            }
        }
    </script>
</x-app-layout>