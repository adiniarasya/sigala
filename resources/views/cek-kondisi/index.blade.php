<x-app-layout>
    <div class="max-w-3xl mx-auto w-full" x-data="skriningApp()">
        
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-sigala-dark mb-2 tracking-tight">Cek Kondisi Kesehatan</h1>
            <p class="text-gray-500 text-base">Kami akan mengajukan beberapa pertanyaan skrining.</p>
        </div>

        <div x-show="step === 1" x-transition class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 flex items-start mb-8">
                <div class="bg-blue-500 text-white p-2.5 rounded-xl mr-4 shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <div>
                    <h2 class="text-blue-900 font-bold text-lg mb-1">Skrining Mandiri</h2>
                    <p class="text-blue-700 text-sm">Aplikasi ini tidak memberikan diagnosis medis. Hasil hanya berupa indikasi awal.</p>
                </div>
            </div>

            <h3 class="text-lg font-bold text-sigala-dark mb-4">Apa yang Anda rasakan?</h3>
            <div class="grid grid-cols-2 gap-3 mb-8">
                <button @click="pilihKeluhan('Demam')" :class="keluhan === 'Demam' ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-xl p-4 flex items-center font-semibold text-sm transition">
                    <span class="text-xl mr-3">🌡️</span> Demam
                </button>
                <button @click="pilihKeluhan('Sesak Napas')" :class="keluhan === 'Sesak Napas' ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-xl p-4 flex items-center font-semibold text-sm transition">
                    <span class="text-xl mr-3">🫁</span> Sesak Napas
                </button>
                <button @click="pilihKeluhan('Pusing')" :class="keluhan === 'Pusing' ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-xl p-4 flex items-center font-semibold text-sm transition">
                    <span class="text-xl mr-3">🧠</span> Pusing
                </button>
                <button @click="pilihKeluhan('Luka')" :class="keluhan === 'Luka' ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-xl p-4 flex items-center font-semibold text-sm transition">
                    <span class="text-xl mr-3">🩹</span> Luka
                </button>
            </div>
            <button @click="mulaiSkrining()" :disabled="!keluhan" :class="!keluhan ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-700'" class="w-full py-3.5 bg-sigala-blue text-white font-bold rounded-xl transition">
                Lanjutkan
            </button>
        </div>

        <div x-show="step >= 2 && step <= 6" x-transition class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
            <div class="mb-6">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs font-bold text-sigala-blue">Pertanyaan Skrining</span>
                    <span class="text-xs font-bold text-gray-500" x-text="(step - 1) + ' / 5'"></span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2">
                    <div class="bg-sigala-blue h-2 rounded-full transition-all duration-300" :style="`width: ${((step - 1) / 5) * 100}%`"></div>
                </div>
            </div>

            <h3 class="text-lg font-bold text-sigala-dark mb-6" x-text="pertanyaan[step - 2].teks"></h3>

            <div class="space-y-3 mb-8">
                <button @click="jawab(true)" class="w-full text-left border rounded-xl p-4 flex items-center font-semibold text-sm transition" :class="jawaban[step - 2] === true ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    <div class="w-5 h-5 rounded-full border-2 mr-3 flex items-center justify-center" :class="jawaban[step - 2] === true ? 'border-sigala-blue' : 'border-gray-300'">
                        <div class="w-2.5 h-2.5 rounded-full bg-sigala-blue" x-show="jawaban[step - 2] === true"></div>
                    </div>
                    Ya
                </button>
                <button @click="jawab(false)" class="w-full text-left border rounded-xl p-4 flex items-center font-semibold text-sm transition" :class="jawaban[step - 2] === false ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    <div class="w-5 h-5 rounded-full border-2 mr-3 flex items-center justify-center" :class="jawaban[step - 2] === false ? 'border-sigala-blue' : 'border-gray-300'">
                        <div class="w-2.5 h-2.5 rounded-full bg-sigala-blue" x-show="jawaban[step - 2] === false"></div>
                    </div>
                    Tidak
                </button>
            </div>

            <div class="flex gap-3">
                <button @click="step--" class="w-1/3 py-3.5 border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition">Kembali</button>
                <button @click="lanjut()" :disabled="jawaban[step - 2] === null" :class="jawaban[step - 2] === null ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-700'" class="w-2/3 py-3.5 bg-sigala-blue text-white font-bold rounded-xl transition">
                    <span x-text="step === 6 ? 'Lihat Hasil' : 'Lanjutkan'"></span>
                </button>
            </div>
        </div>

        <div x-show="step === 7" x-transition class="bg-white border border-gray-100 rounded-3xl p-8 shadow-sm">
            <div x-show="tandaBahaya.length > 0">
                <div class="bg-red-50 border border-red-100 rounded-2xl p-8 text-center mb-6">
                    <div class="w-16 h-16 bg-red-500 text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-red-200">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-red-800 mb-2">Segera ke Fasilitas Kesehatan</h3>
                    <p class="text-red-700 text-sm">Untuk memastikan kondisi Anda, segera kunjungi fasilitas kesehatan terdekat atau hubungi layanan darurat.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-2xl p-6 mb-8">
                    <h4 class="font-bold text-sigala-dark text-sm mb-3">Tanda Bahaya Terdeteksi:</h4>
                    <ul class="space-y-2">
                        <template x-for="tb in tandaBahaya" :key="tb">
                            <li class="flex items-start text-sm text-gray-700 font-medium">
                                <span class="text-red-500 mr-2 font-bold">•</span>
                                <span x-text="tb"></span>
                            </li>
                        </template>
                    </ul>
                </div>
                <div class="space-y-3">
                    <button class="w-full py-3.5 bg-red-600 text-white font-bold rounded-xl shadow-md hover:bg-red-700 transition flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        Hubungi Layanan Darurat (112)
                    </button>
                    <a href="{{ route('dashboard') }}" class="block w-full py-3.5 border border-gray-300 text-gray-700 font-bold rounded-xl text-center hover:bg-gray-50 transition">Kembali ke Beranda</a>
                </div>
            </div>

            <div x-show="tandaBahaya.length === 0">
                <div class="bg-teal-50 border border-teal-100 rounded-2xl p-8 text-center mb-6">
                    <div class="w-16 h-16 bg-teal-500 text-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg shadow-teal-200">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-extrabold text-teal-800 mb-2">Tidak Ditemukan Tanda Bahaya</h3>
                    <p class="text-teal-700 text-sm">Berdasarkan jawaban Anda, saat ini tidak ditemukan tanda bahaya yang memerlukan pertolongan darurat.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-2xl p-6 mb-8">
                    <h4 class="font-bold text-sigala-dark text-sm mb-4">Rekomendasi untuk Anda:</h4>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-blue-50 text-sigala-blue rounded-lg flex items-center justify-center mr-3 shrink-0">💧</div>
                            <div>
                                <h5 class="text-sm font-bold text-gray-800">Pantau Kondisi Anda</h5>
                                <p class="text-xs text-gray-500 mt-1">Istirahat yang cukup dan hindari pekerjaan berat.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-blue-50 text-sigala-blue rounded-lg flex items-center justify-center mr-3 shrink-0">📋</div>
                            <div>
                                <h5 class="text-sm font-bold text-gray-800">Ikuti Panduan Kesehatan</h5>
                                <p class="text-xs text-gray-500 mt-1">Konsumsi obat sesuai anjuran dan jaga pola makan.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-blue-50 text-sigala-blue rounded-lg flex items-center justify-center mr-3 shrink-0">🩺</div>
                            <div>
                                <h5 class="text-sm font-bold text-gray-800">Konsultasi dengan Perawat</h5>
                                <p class="text-xs text-gray-500 mt-1">Jika keluhan berlanjut, hubungi layanan kesehatan dekat Anda.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="block w-full py-3.5 bg-sigala-blue text-white font-bold rounded-xl text-center shadow-md hover:bg-blue-700 transition">Kembali ke Beranda</a>
            </div>
        </div>

    </div>

    <script>
        function skriningApp() {
            return {
                step: 1,
                keluhan: '',
                jawaban: [null, null, null, null, null],
                pertanyaan: [
                    { teks: 'Apakah Anda mengalami sesak napas saat ini?', label: 'Sesak napas' },
                    { teks: 'Apakah demam sudah berlangsung selama 3 hari atau lebih?', label: 'Demam lebih dari 3 hari' },
                    { teks: 'Apakah suhu tubuh Anda ≥ 38°C?', label: 'Suhu tubuh tinggi' },
                    { teks: 'Apakah Anda mengalami sakit kepala yang berat?', label: 'Sakit kepala berat' },
                    { teks: 'Apakah Anda mengalami menggigil atau berkeringat berlebihan?', label: 'Menggigil/berkeringat' }
                ],
                get tandaBahaya() {
                    let hasil = [];
                    this.jawaban.forEach((jwb, index) => {
                        if (jwb === true) {
                            hasil.push(this.pertanyaan[index].label);
                        }
                    });
                    return hasil;
                },
                pilihKeluhan(k) {
                    this.keluhan = k;
                },
                mulaiSkrining() {
                    if (this.keluhan) {
                        this.step = 2;
                    }
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
                    fetch('{{ route('cek-kondisi.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            keluhan: this.keluhan,
                            is_danger: this.tandaBahaya.length > 0,
                            detail_bahaya: JSON.stringify(this.tandaBahaya)
                        })
                    });
                }
            }
        }
    </script>
</x-app-layout>