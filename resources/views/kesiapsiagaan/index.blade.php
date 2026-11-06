<x-app-layout>
    <div class="max-w-2xl mx-auto w-full" x-data="kesiapsiagaanApp()">
        
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-sigala-dark mb-2 tracking-tight">Cek Kesiapsiagaan</h1>
            <p class="text-gray-500 text-base">Yuk, cek seberapa siap Anda menghadapi bencana.</p>
        </div>

        <div x-show="step === 1" x-transition class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm text-center">
            <div class="w-32 h-32 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-16 h-16 text-sigala-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h2 class="text-xl font-bold text-sigala-dark mb-4">Apakah Anda sudah siap?</h2>
            <p class="text-sm text-gray-500 mb-8 leading-relaxed">Hasil dari pengecekan ini akan membantu Anda mengetahui tingkat kesiapsiagaan dan mendapatkan rekomendasi yang sesuai.</p>
            <button @click="step = 2" class="w-full py-3.5 bg-sigala-blue text-white font-bold rounded-xl shadow-md transition-all hover:bg-blue-700">
                Mulai Cek
            </button>
        </div>

        <div x-show="step >= 2 && step <= 6" x-transition class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
            
            <div class="mb-8">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs font-bold text-sigala-blue">Pertanyaan</span>
                    <span class="text-xs font-bold text-gray-500" x-text="(step - 1) + ' / 5'"></span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2">
                    <div class="bg-sigala-blue h-2 rounded-full transition-all duration-300" :style="`width: ${((step - 1) / 5) * 100}%`"></div>
                </div>
            </div>

            <h3 class="text-lg font-bold text-sigala-dark mb-6" x-text="pertanyaan[step - 2].teks"></h3>

            <div class="space-y-3 mb-8">
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

            <div class="flex gap-3">
                <button @click="step--" class="w-1/3 py-3.5 border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition">Kembali</button>
                <button @click="lanjut()" :disabled="jawaban[step - 2] === null" :class="jawaban[step - 2] === null ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-700'" class="w-2/3 py-3.5 bg-sigala-blue text-white font-bold rounded-xl transition">
                    <span x-text="step === 6 ? 'Lihat Hasil' : 'Lanjutkan'"></span>
                </button>
            </div>
        </div>

        <div x-show="step === 7" x-transition class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm text-center">
            <div class="w-32 h-32 mx-auto rounded-full flex items-center justify-center mb-6" :class="skorPersen >= 80 ? 'bg-teal-50' : (skorPersen >= 40 ? 'bg-orange-50' : 'bg-red-50')">
                <svg class="w-16 h-16" :class="skorPersen >= 80 ? 'text-teal-500' : (skorPersen >= 40 ? 'text-orange-500' : 'text-red-500')" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            
            <h2 class="text-2xl font-extrabold text-sigala-dark mb-2">Tingkat Kesiapsiagaan Anda</h2>
            <h3 class="text-4xl font-black mb-4" :class="skorPersen >= 80 ? 'text-teal-600' : (skorPersen >= 40 ? 'text-orange-500' : 'text-red-600')" x-text="statusTeks"></h3>
            <p class="text-xl font-bold text-gray-400 mb-8" x-text="skorPersen + '%'"></p>

            <div class="w-full bg-gray-100 rounded-full h-3 mb-8">
                <div class="h-3 rounded-full transition-all duration-1000" :class="skorPersen >= 80 ? 'bg-teal-500' : (skorPersen >= 40 ? 'bg-orange-400' : 'bg-red-500')" :style="`width: ${skorPersen}%`"></div>
            </div>

            <p class="text-sm text-gray-500 mb-8 leading-relaxed">Masih ada beberapa hal yang perlu dilengkapi agar lebih siap menghadapi bencana.</p>

            <div class="bg-gray-50 rounded-2xl p-6 text-left mb-8 border border-gray-100">
                <h4 class="font-bold text-sigala-dark text-sm mb-4">Detail Penilaian:</h4>
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">Tas Siaga</span>
                        <span class="font-bold text-sigala-blue" x-text="getSkor(0)"></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">Obat & P3K</span>
                        <span class="font-bold text-sigala-blue" x-text="getSkor(1)"></span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-600">Lokasi Aman</span>
                        <span class="font-bold text-sigala-blue" x-text="getSkor(2)"></span>
                    </div>
                </div>
            </div>

            <a href="{{ route('dashboard') }}" class="block w-full py-3.5 bg-sigala-blue text-white font-bold rounded-xl text-center shadow-md hover:bg-blue-700 transition">
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
                    { teks: 'Apakah Anda sudah menyiapkan Tas Siaga Bencana?', label: 'Tas Siaga' },
                    { teks: 'Apakah Anda sudah menyediakan makanan dan air untuk keadaan darurat?', label: 'Makanan & Air' },
                    { teks: 'Apakah Anda sudah menyiapkan obat-obatan pribadi dan perlengkapan P3K?', label: 'Obat & P3K' },
                    { teks: 'Apakah Anda sudah mengetahui lokasi aman atau titik evakuasi terdekat?', label: 'Lokasi Aman' },
                    { teks: 'Apakah Anda sudah memiliki rencana komunikasi dengan keluarga?', label: 'Rencana Komunikasi' }
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
                            this.simpanSkor();
                        }
                    }
                },
                simpanSkor() {
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