<x-app-layout>
    <div class="max-w-xl mx-auto w-full" x-data="kesiapsiagaanApp()">
        
        <div x-show="step === 1" x-transition class="flex flex-col items-center justify-center min-h-[80vh] text-center">
            <div class="w-48 h-48 bg-blue-50 rounded-full flex items-center justify-center mb-8 relative">
                <img src="https://img.freepik.com/free-vector/doctor-concept-illustration_114360-1176.jpg" alt="Perawat" class="w-40 h-40 object-contain mix-blend-multiply">
            </div>
            <h1 class="text-2xl font-extrabold text-sigala-blue mb-3">Cek Kesiapsiagaan Anda</h1>
            <p class="text-sm text-gray-500 mb-8 max-w-xs leading-relaxed">Yuk, cek seberapa siap Anda menghadapi bencana.</p>
            
            <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-6 w-full max-w-sm mb-8">
                <p class="text-xs text-sigala-dark font-semibold leading-relaxed">Hasil dari pengecekan ini akan membantu Anda mengetahui tingkat kesiapsiagaan dan mendapatkan rekomendasi yang sesuai.</p>
            </div>

            <button @click="step = 2" class="w-full max-w-sm py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex items-center justify-center">
                Mulai Cek &rarr;
            </button>
        </div>

        <div x-show="step >= 2 && step <= 6" x-transition class="mt-6">
            <div class="mb-6 flex items-center">
                <a href="{{ route('dashboard') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark">Cek Kesiapsiagaan</h1>
            </div>

            <div class="flex flex-col items-center justify-center mb-8">
                <div class="w-32 h-32 bg-blue-50 rounded-full flex items-center justify-center mb-6">
                    <span class="text-6xl" x-text="pertanyaan[step - 2].ikon"></span>
                </div>
                
                <div class="w-full max-w-sm">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-xs font-bold text-sigala-blue">Pertanyaan</span>
                        <span class="text-xs font-bold text-gray-500" x-text="(step - 1) + ' / 5'"></span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2 mb-6">
                        <div class="bg-sigala-blue h-2 rounded-full transition-all duration-300" :style="`width: ${((step - 1) / 5) * 100}%`"></div>
                    </div>
                </div>
            </div>

            <h3 class="text-lg font-bold text-sigala-dark mb-6 text-center px-4" x-text="pertanyaan[step - 2].teks"></h3>

            <div class="space-y-3 mb-8 max-w-sm mx-auto">
                <button @click="jawab(2)" class="w-full text-left border rounded-xl p-4 flex items-center font-semibold text-sm transition" :class="jawaban[step - 2] === 2 ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    <div class="w-5 h-5 rounded-full border-2 mr-3 flex items-center justify-center" :class="jawaban[step - 2] === 2 ? 'border-sigala-blue' : 'border-gray-300'">
                        <div class="w-2.5 h-2.5 rounded-full bg-sigala-blue" x-show="jawaban[step - 2] === 2"></div>
                    </div>
                    Sudah
                </button>
                <button @click="jawab(0)" class="w-full text-left border rounded-xl p-4 flex items-center font-semibold text-sm transition" :class="jawaban[step - 2] === 0 ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    <div class="w-5 h-5 rounded-full border-2 mr-3 flex items-center justify-center" :class="jawaban[step - 2] === 0 ? 'border-sigala-blue' : 'border-gray-300'">
                        <div class="w-2.5 h-2.5 rounded-full bg-sigala-blue" x-show="jawaban[step - 2] === 0"></div>
                    </div>
                    Belum
                </button>
                <button @click="jawab(1)" class="w-full text-left border rounded-xl p-4 flex items-center font-semibold text-sm transition" :class="jawaban[step - 2] === 1 ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    <div class="w-5 h-5 rounded-full border-2 mr-3 flex items-center justify-center" :class="jawaban[step - 2] === 1 ? 'border-sigala-blue' : 'border-gray-300'">
                        <div class="w-2.5 h-2.5 rounded-full bg-sigala-blue" x-show="jawaban[step - 2] === 1"></div>
                    </div>
                    Tidak Tahu
                </button>
            </div>

            <div class="flex gap-3 max-w-sm mx-auto">
                <button @click="step--" class="w-1/3 py-3.5 border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition">Kembali</button>
                <button @click="lanjut()" :disabled="jawaban[step - 2] === null" :class="jawaban[step - 2] === null ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-700'" class="w-2/3 py-3.5 bg-sigala-blue text-white font-bold rounded-xl transition">
                    <span x-text="step === 6 ? 'Lihat Hasil' : 'Lanjutkan'"></span>
                </button>
            </div>
        </div>

        <div x-show="step === 7" x-transition class="mt-6">
            <div class="mb-6 flex items-center">
                <a href="{{ route('dashboard') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark">Hasil Kesiapsiagaan</h1>
            </div>

            <div class="bg-white border border-gray-100 rounded-[2rem] p-8 text-center shadow-sm mb-6">
                <div class="relative w-40 h-40 mx-auto mb-6">
                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                        <path class="text-gray-100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
                        <path class="text-sigala-blue transition-all duration-1000 ease-out" :stroke-dasharray="`${skorPersen}, 100`" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-3xl font-black text-sigala-blue" x-text="skorPersen + '%'"></span>
                    </div>
                </div>

                <h2 class="text-2xl font-extrabold mb-2" :class="skorPersen >= 80 ? 'text-teal-600' : (skorPersen >= 40 ? 'text-orange-500' : 'text-red-600')" x-text="statusTeks"></h2>
                <p class="text-sm text-gray-500 mb-6">Masih ada beberapa hal yang perlu dilengkapi agar lebih siap menghadapi bencana.</p>
            </div>

            <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm mb-8">
                <h3 class="font-bold text-sigala-blue text-sm mb-4">Detail Penilaian</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-sm bg-gray-50 p-3 rounded-xl">
                        <div class="flex items-center">
                            <span class="w-6 h-6 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mr-3 text-xs">✓</span>
                            <span class="font-semibold text-gray-700">Tas Siaga</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm bg-gray-50 p-3 rounded-xl">
                        <div class="flex items-center">
                            <span class="w-6 h-6 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mr-3 text-xs">✓</span>
                            <span class="font-semibold text-gray-700">Obat dan P3K</span>
                        </div>
                    </div>
                    <div class="flex items-center justify-between text-sm bg-gray-50 p-3 rounded-xl">
                        <div class="flex items-center">
                            <span class="w-6 h-6 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center mr-3 text-xs">!</span>
                            <span class="font-semibold text-gray-700">Lokasi Aman</span>
                        </div>
                    </div>
                </div>
            </div>

            <button @click="step = 8" class="w-full py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex items-center justify-center">
                Lihat Rekomendasi &rarr;
            </button>
        </div>

        <div x-show="step === 8" x-transition class="flex flex-col items-center justify-center min-h-[80vh] text-center">
            <div class="w-48 h-48 bg-blue-50 rounded-full flex items-center justify-center mb-8 relative">
                <svg class="w-32 h-32 text-sigala-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h1 class="text-2xl font-extrabold text-sigala-blue mb-3">Kesiapsiagaan Anda sudah dicek!</h1>
            <p class="text-sm text-gray-500 mb-8 max-w-xs leading-relaxed">Terima kasih sudah meluangkan waktu untuk memeriksa kesiapsiagaan Anda. Tetap waspada dan selalu siap!</p>
            
            <a href="{{ route('dashboard') }}" class="w-full max-w-sm py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex items-center justify-center">
                Kembali ke Beranda
            </a>
        </div>

    </div>

    <script>
        function kesiapsiagaanApp() {
            return {
                step: 1,
                jawaban: [null, null, null, null, null],
                pertanyaan: [
                    { teks: 'Apakah Anda sudah menyiapkan Tas Siaga Bencana?', ikon: '🎒' },
                    { teks: 'Apakah Anda sudah menyediakan makanan dan air untuk keadaan darurat?', ikon: '🥤' },
                    { teks: 'Apakah Anda sudah menyiapkan obat-obatan pribadi dan perlengkapan P3K?', ikon: '🩹' },
                    { teks: 'Apakah Anda sudah mengetahui lokasi aman atau titik evakuasi terdekat?', ikon: '🗺️' },
                    { teks: 'Apakah Anda sudah memiliki rencana komunikasi dengan keluarga?', ikon: '📞' }
                ],
                get totalSkor() {
                    return this.jawaban.reduce((sum, val) => sum + (val || 0), 0);
                },
                get skorPersen() {
                    return Math.round((this.totalSkor / 10) * 100);
                },
                get statusTeks() {
                    if (this.skorPersen >= 80) return 'SIAP';
                    if (this.skorPersen >= 40) return 'CUKUP SIAP';
                    return 'BELUM SIAP';
                },
                jawab(val) {
                    this.jawaban[this.step - 2] = val;
                },
                lanjut() {
                    if (this.jawaban[this.step - 2] !== null) {
                        this.step++;
                        if (this.step === 7) {
                            this.simpanHasil();
                        }
                    }
                },
                simpanHasil() {
                    fetch('{{ route('kesiapsiagaan.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            score: this.skorPersen,
                            status: this.statusTeks
                        })
                    });
                }
            }
        }
    </script>
</x-app-layout>