<x-app-layout>
    <div class="max-w-xl mx-auto w-full pb-24" x-data="skriningApp()">
        
        <!-- SLIDE 1: DEPAN -->
        <div x-show="step === 0" x-transition class="flex flex-col items-center justify-center min-h-[70vh] text-center px-4">
            
            <!-- Ini gue pake cek-kondisi.png (yang di screenshot lu bentuknya pas buat lingkaran) -->
            <div class="w-48 h-48 sm:w-56 sm:h-56 bg-blue-50 rounded-full flex items-center justify-center mb-8 relative p-6">
                <img src="{{ asset('images/cek-kondisi.png') }}" alt="Cek Kondisi" class="w-full h-full object-contain">
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold text-sigala-blue mb-3">Cek Kesiapsiagaan Anda</h1>
            <p class="text-sm sm:text-base text-gray-500 mb-8 max-w-xs leading-relaxed">Yuk, cek seberapa siap Anda menghadapi bencana.</p>
            
            <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-5 sm:p-6 w-full max-w-sm mb-8">
                <p class="text-xs text-sigala-dark font-semibold leading-relaxed">Hasil dari pengecekan ini akan membantu Anda mengetahui tingkat kesiapsiagaan dan mendapatkan rekomendasi yang sesuai.</p>
            </div>

            <button @click="step = 1" class="w-full max-w-sm py-3.5 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex items-center justify-center">
                Mulai Cek &rarr;
            </button>
        </div>

        <!-- SLIDE 2: PILIH KELUHAN -->
        <div x-show="step === 1" x-transition>
            <div class="mb-6 flex items-center">
                <a href="{{ route('dashboard') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark">Cek Kondisi</h1>
            </div>

            <!-- Ini gue pake cek-kondisibuku.png (yang landscape) di dalam kotak banner -->
            <div class="bg-blue-50 border border-blue-100 rounded-3xl p-5 sm:p-8 flex flex-col sm:flex-row items-center sm:items-start gap-4 mb-8 relative overflow-hidden">
                <div class="w-32 h-24 sm:w-40 sm:h-32 shrink-0">
                    <img src="{{ asset('images/cek-kondisibuku.png') }}" alt="Ilustrasi Cek Kondisi" class="w-full h-full object-contain">
                </div>
                <div class="text-center sm:text-left flex-1">
                    <h2 class="text-blue-900 font-extrabold text-lg sm:text-xl mb-2">Cek Kondisi Kesehatan Anda</h2>
                    <p class="text-blue-700 text-xs sm:text-sm mb-4 leading-relaxed">Kami akan mengajukan beberapa pertanyaan skrining untuk mengidentifikasi tanda bahaya dan memberikan rekomendasi.</p>
                    <div class="inline-flex items-center text-[10px] font-bold text-blue-800 bg-blue-100/50 px-3 py-1.5 rounded-lg border border-blue-200">
                        <svg class="w-3.5 h-3.5 mr-1.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Aplikasi ini tidak memberikan diagnosis medis.
                    </div>
                </div>
            </div>

            <h3 class="text-lg font-bold text-sigala-dark mb-4">Apa yang Anda rasakan?</h3>
            <p class="text-xs text-gray-500 mb-4">Pilih keluhan yang sedang Anda alami.</p>
            
            <div class="grid grid-cols-2 gap-3 mb-8">
                <button @click="pilihKeluhan('Demam')" :class="keluhan === 'Demam' ? 'border-red-500 bg-red-50 text-red-600' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-2xl p-3 flex items-center justify-between font-semibold text-xs sm:text-sm transition text-left">
                    <div class="flex items-center">
                        <img src="{{ asset('images/cidera.png') }}" class="w-6 h-6 object-contain mr-2 sm:mr-3" alt="Demam"> Demam
                    </div>
                </button>
                <button @click="pilihKeluhan('Pusing')" :class="keluhan === 'Pusing' ? 'border-blue-500 bg-blue-50 text-blue-600' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-2xl p-3 flex items-center justify-between font-semibold text-xs sm:text-sm transition text-left">
                    <div class="flex items-center">
                        <img src="{{ asset('images/pingsan.png') }}" class="w-6 h-6 object-contain mr-2 sm:mr-3" alt="Pusing"> Pusing
                    </div>
                </button>
                <button @click="pilihKeluhan('Sesak Napas')" :class="keluhan === 'Sesak Napas' ? 'border-green-500 bg-green-50 text-green-600' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-2xl p-3 flex items-center justify-between font-semibold text-xs sm:text-sm transition text-left">
                    <div class="flex items-center">
                        <img src="{{ asset('images/dehidrasi.png') }}" class="w-6 h-6 object-contain mr-2 sm:mr-3" alt="Sesak"> Sesak napas
                    </div>
                </button>
                <button @click="pilihKeluhan('Luka')" :class="keluhan === 'Luka' ? 'border-orange-500 bg-orange-50 text-orange-600' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-2xl p-3 flex items-center justify-between font-semibold text-xs sm:text-sm transition text-left">
                    <div class="flex items-center">
                        <img src="{{ asset('images/luka.png') }}" class="w-6 h-6 object-contain mr-2 sm:mr-3" alt="Luka"> Luka
                    </div>
                </button>
                <button @click="pilihKeluhan('Mual')" :class="keluhan === 'Mual' ? 'border-purple-500 bg-purple-50 text-purple-600' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-2xl p-3 flex items-center justify-between font-semibold text-xs sm:text-sm transition text-left">
                    <div class="flex items-center">
                        <img src="{{ asset('images/pendarahan.png') }}" class="w-6 h-6 object-contain mr-2 sm:mr-3" alt="Mual"> Mual
                    </div>
                </button>
                <button @click="pilihKeluhan('Nyeri')" :class="keluhan === 'Nyeri' ? 'border-teal-500 bg-teal-50 text-teal-600' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-2xl p-3 flex items-center justify-between font-semibold text-xs sm:text-sm transition text-left">
                    <div class="flex items-center">
                        <img src="{{ asset('images/luka-bakar.png') }}" class="w-6 h-6 object-contain mr-2 sm:mr-3" alt="Nyeri"> Nyeri
                    </div>
                </button>
                <button @click="pilihKeluhan('Lemas')" :class="keluhan === 'Lemas' ? 'border-yellow-500 bg-yellow-50 text-yellow-600' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-2xl p-3 flex items-center justify-between font-semibold text-xs sm:text-sm transition text-left">
                    <div class="flex items-center">
                        <img src="{{ asset('images/pingsan.png') }}" class="w-6 h-6 object-contain mr-2 sm:mr-3" alt="Lemas"> Lemas
                    </div>
                </button>
                <button @click="pilihKeluhan('Lainnya')" :class="keluhan === 'Lainnya' ? 'border-gray-500 bg-gray-100 text-gray-800' : 'border-gray-200 text-gray-700 hover:bg-gray-50'" class="border rounded-2xl p-3 flex items-center justify-between font-semibold text-xs sm:text-sm transition text-left">
                    <div class="flex items-center">
                        <img src="{{ asset('images/cek-kondisibuku.png') }}" class="w-6 h-6 object-contain mr-2 sm:mr-3" alt="Lainnya"> Lainnya
                    </div>
                </button>
            </div>
            <button @click="mulaiSkrining()" :disabled="!keluhan" :class="!keluhan ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-700'" class="w-full py-4 bg-sigala-blue text-white font-bold rounded-xl transition shadow-md flex items-center justify-center">
                Lanjutkan <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>

        <!-- SLIDE 3: PERTANYAAN -->
        <div x-show="step >= 2 && step <= 6" x-transition>
            <div class="mb-6 flex items-center">
                <a href="{{ route('dashboard') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark">Cek Kondisi</h1>
            </div>

            <div class="flex items-center justify-between mb-8 relative px-2 sm:px-4">
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-gray-200 -z-10 rounded-full"></div>
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-sigala-blue -z-10 rounded-full transition-all duration-300" :style="`width: ${((step - 1) / 3) * 100}%`"></div>
                
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm transition-colors" :class="step >= 1 ? 'bg-sigala-blue text-white shadow-md' : 'bg-white border-2 border-gray-200 text-gray-400'">1</div>
                    <span class="text-[9px] sm:text-[10px] font-bold mt-2 text-gray-500">Keluhan</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm transition-colors" :class="step >= 2 ? 'bg-sigala-blue text-white shadow-md' : 'bg-white border-2 border-gray-200 text-gray-400'">2</div>
                    <span class="text-[9px] sm:text-[10px] font-bold mt-2 text-gray-500">Skrining</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm transition-colors" :class="step >= 7 ? 'bg-sigala-blue text-white shadow-md' : 'bg-white border-2 border-gray-200 text-gray-400'">3</div>
                    <span class="text-[9px] sm:text-[10px] font-bold mt-2 text-gray-500">Tanda Bahaya</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm transition-colors" :class="step >= 7 ? 'bg-sigala-blue text-white shadow-md' : 'bg-white border-2 border-gray-200 text-gray-400'">4</div>
                    <span class="text-[9px] sm:text-[10px] font-bold mt-2 text-gray-500">Rekomendasi</span>
                </div>
            </div>

            <div class="mb-6">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-xs font-bold text-sigala-blue">Pertanyaan Skrining</span>
                    <span class="text-xs font-bold text-gray-500" x-text="(step - 1) + ' / 5'"></span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2">
                    <div class="bg-sigala-blue h-2 rounded-full transition-all duration-300" :style="`width: ${((step - 1) / 5) * 100}%`"></div>
                </div>
            </div>

            <h3 class="text-base sm:text-lg font-bold text-sigala-dark mb-6" x-text="pertanyaanAktif[step - 2].teks"></h3>

            <div class="space-y-3 mb-8">
                <button @click="jawab(true)" class="w-full text-left border rounded-xl p-4 flex items-center font-semibold text-sm transition" :class="jawaban[step - 2] === true ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    <div class="w-5 h-5 rounded-full border-2 mr-3 flex items-center justify-center shrink-0" :class="jawaban[step - 2] === true ? 'border-sigala-blue' : 'border-gray-300'">
                        <div class="w-2.5 h-2.5 rounded-full bg-sigala-blue" x-show="jawaban[step - 2] === true"></div>
                    </div>
                    Ya
                </button>
                <button @click="jawab(false)" class="w-full text-left border rounded-xl p-4 flex items-center font-semibold text-sm transition" :class="jawaban[step - 2] === false ? 'border-sigala-blue bg-blue-50 text-sigala-blue' : 'border-gray-200 text-gray-700 hover:bg-gray-50'">
                    <div class="w-5 h-5 rounded-full border-2 mr-3 flex items-center justify-center shrink-0" :class="jawaban[step - 2] === false ? 'border-sigala-blue' : 'border-gray-300'">
                        <div class="w-2.5 h-2.5 rounded-full bg-sigala-blue" x-show="jawaban[step - 2] === false"></div>
                    </div>
                    Tidak
                </button>
            </div>

            <div class="flex gap-2 sm:gap-3 mb-6">
                <button @click="step--" class="w-1/3 py-3 sm:py-3.5 border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition text-sm">Kembali</button>
                <button @click="lanjut()" :disabled="jawaban[step - 2] === null" :class="jawaban[step - 2] === null ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-700'" class="w-2/3 py-3 sm:py-3.5 bg-sigala-blue text-white font-bold rounded-xl transition flex justify-center items-center text-sm">
                    <span x-text="step === 6 ? 'Lihat Hasil' : 'Lanjutkan'"></span> <svg class="w-4 h-4 sm:w-5 sm:h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>

            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 flex items-start">
                <div class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-3 shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-xs text-sigala-dark leading-relaxed">Jawaban Anda akan membantu kami mengidentifikasi tanda bahaya dengan lebih tepat.</p>
            </div>
        </div>

        <!-- SLIDE 4: HASIL -->
        <div x-show="step === 7" x-transition>
            <div class="mb-6 flex items-center">
                <a href="{{ route('dashboard') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark">Cek Kondisi</h1>
            </div>

            <div class="flex items-center justify-between mb-8 relative px-2 sm:px-4">
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-gray-200 -z-10 rounded-full"></div>
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-sigala-blue -z-10 rounded-full transition-all duration-300" style="width: 100%"></div>
                
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm bg-sigala-blue text-white shadow-md">1</div>
                    <span class="text-[9px] sm:text-[10px] font-bold mt-2 text-gray-500">Keluhan</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm bg-sigala-blue text-white shadow-md">2</div>
                    <span class="text-[9px] sm:text-[10px] font-bold mt-2 text-gray-500">Skrining</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm bg-sigala-blue text-white shadow-md">3</div>
                    <span class="text-[9px] sm:text-[10px] font-bold mt-2 text-gray-500">Tanda Bahaya</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full flex items-center justify-center font-bold text-xs sm:text-sm bg-sigala-blue text-white shadow-md">4</div>
                    <span class="text-[9px] sm:text-[10px] font-bold mt-2 text-gray-500">Rekomendasi</span>
                </div>
            </div>

            <div x-show="tandaBahaya.length > 0">
                <div class="bg-red-50 border border-red-100 rounded-[2rem] p-6 sm:p-8 text-center mb-6">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-red-100 text-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-red-600 mb-2">Segera ke Fasilitas Kesehatan</h3>
                    <p class="text-red-800 text-xs sm:text-sm leading-relaxed">Untuk memastikan kondisi Anda, segera kunjungi fasilitas kesehatan terdekat atau hubungi layanan darurat.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-3xl p-5 sm:p-6 mb-8 shadow-sm">
                    <h4 class="font-bold text-red-600 text-sm mb-4">Tanda Bahaya Terdeteksi</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start text-xs sm:text-sm text-gray-700 font-medium">
                            <span class="text-red-500 mr-2 font-bold">•</span>
                            <span>Keluhan Utama: <span x-text="keluhan"></span></span>
                        </li>
                        <template x-for="tb in tandaBahaya" :key="tb">
                            <li class="flex items-start text-xs sm:text-sm text-gray-700 font-medium">
                                <span class="text-red-500 mr-2 font-bold">•</span>
                                <span x-text="tb"></span>
                            </li>
                        </template>
                    </ul>
                </div>
                <div class="space-y-3">
                    <button class="w-full py-3.5 bg-red-600 text-white font-bold rounded-xl shadow-md hover:bg-red-700 transition flex items-center justify-center text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        Cari Pertolongan Sekarang
                    </button>
                    <button class="w-full py-3.5 border-2 border-red-500 text-red-600 font-bold rounded-xl hover:bg-red-50 transition flex items-center justify-center text-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        Hubungi Layanan Darurat
                    </button>
                    <a href="{{ route('dashboard') }}" class="block w-full py-3.5 bg-sigala-blue text-white font-bold rounded-xl text-center hover:bg-blue-700 transition text-sm">Selesai</a>
                </div>
            </div>

            <div x-show="tandaBahaya.length === 0">
                <div class="bg-teal-50 border border-teal-100 rounded-[2rem] p-6 sm:p-8 text-center mb-6">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-teal-100 text-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-extrabold text-teal-800 mb-2">Tidak Ditemukan Tanda Bahaya</h3>
                    <p class="text-teal-700 text-xs sm:text-sm leading-relaxed">Berdasarkan jawaban Anda, saat ini tidak ditemukan tanda bahaya yang memerlukan pertolongan darurat.</p>
                </div>
                <div class="bg-white border border-gray-200 rounded-3xl p-5 sm:p-6 mb-8 shadow-sm">
                    <h4 class="font-bold text-sigala-dark text-sm mb-4">Rekomendasi untuk Anda:</h4>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-teal-50 text-teal-500 rounded-xl flex items-center justify-center mr-3 sm:mr-4 shrink-0 text-lg">💧</div>
                            <div>
                                <h5 class="text-xs sm:text-sm font-bold text-gray-800">Pantau Kondisi Anda</h5>
                                <p class="text-[10px] sm:text-xs text-gray-500 mt-1">Istirahat yang cukup dan hindari pekerjaan berat.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-teal-50 text-teal-500 rounded-xl flex items-center justify-center mr-3 sm:mr-4 shrink-0 text-lg">📋</div>
                            <div>
                                <h5 class="text-xs sm:text-sm font-bold text-gray-800">Ikuti Panduan Kesehatan</h5>
                                <p class="text-[10px] sm:text-xs text-gray-500 mt-1">Konsumsi obat sesuai anjuran dan jaga pola makan.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-teal-50 text-teal-500 rounded-xl flex items-center justify-center mr-3 sm:mr-4 shrink-0 text-lg">🩺</div>
                            <div>
                                <h5 class="text-xs sm:text-sm font-bold text-gray-800">Konsultasi dengan Perawat</h5>
                                <p class="text-[10px] sm:text-xs text-gray-500 mt-1">Jika keluhan berlanjut, hubungi layanan kesehatan dekat Anda.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-teal-50 text-teal-500 rounded-xl flex items-center justify-center mr-3 sm:mr-4 shrink-0 text-lg">❤️</div>
                            <div>
                                <h5 class="text-xs sm:text-sm font-bold text-gray-800">Kondisi Umum</h5>
                                <p class="text-[10px] sm:text-xs text-gray-500 mt-1">Dalam keadaan baik.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-3">
                    <a href="{{ route('dashboard') }}" class="block w-full py-3.5 bg-sigala-blue text-white font-bold rounded-xl text-center shadow-md hover:bg-blue-700 transition text-sm">Lanjutkan</a>
                    <button @click="ulangiSkrining()" class="w-full py-3.5 border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition text-sm">Ulangi Skrining</button>
                </div>
            </div>
        </div>

    </div>

    <script>
        function skriningApp() {
            return {
                step: 0,
                keluhan: '',
                jawaban: [null, null, null, null, null],
                bankPertanyaan: {
                    'Demam': [
                        { teks: 'Apakah demam sudah berlangsung selama 3 hari atau lebih?', label: 'Demam lebih dari 3 hari' },
                        { teks: 'Apakah suhu tubuh Anda ≥ 38°C?', label: 'Suhu tubuh tinggi' },
                        { teks: 'Apakah Anda mengalami sakit kepala yang berat?', label: 'Sakit kepala berat' },
                        { teks: 'Apakah Anda mengalami menggigil atau berkeringat berlebihan?', label: 'Menggigil/berkeringat' },
                        { teks: 'Apakah demam disertai ruam merah di kulit?', label: 'Ruam merah' }
                    ],
                    'Sesak Napas': [
                        { teks: 'Apakah sesak napas terjadi saat istirahat?', label: 'Sesak saat istirahat' },
                        { teks: 'Apakah Anda kesulitan berbicara karena sesak?', label: 'Sulit berbicara' },
                        { teks: 'Apakah bibir atau ujung jari membiru?', label: 'Bibir membiru' },
                        { teks: 'Apakah nyeri dada menjalar ke lengan atau rahang?', label: 'Nyeri menjalar' },
                        { teks: 'Apakah sesak disertai batuk berdahak?', label: 'Batuk berdahak' }
                    ],
                    'Pusing': [
                        { teks: 'Apakah pusing disertai mual atau muntah?', label: 'Mual/muntah' },
                        { teks: 'Apakah Anda merasa berputar (vertigo)?', label: 'Vertigo' },
                        { teks: 'Apakah pusing disertai penglihatan kabur?', label: 'Penglihatan kabur' },
                        { teks: 'Apakah Anda pernah pingsan sebelumnya?', label: 'Riwayat pingsan' },
                        { teks: 'Apakah pusing terjadi saat berdiri tiba-tiba?', label: 'Pusing saat berdiri' }
                    ],
                    'Luka': [
                        { teks: 'Apakah luka mengeluarkan darah terus-menerus?', label: 'Pendarahan aktif' },
                        { teks: 'Apakah luka dalam dan lebar?', label: 'Luka dalam/lebar' },
                        { teks: 'Apakah ada benda asing di dalam luka?', label: 'Benda asing' },
                        { teks: 'Apakah luka terasa panas atau bengkak?', label: 'Infeksi' },
                        { teks: 'Apakah Anda mengalami demam setelah luka?', label: 'Demam pasca luka' }
                    ],
                    'Mual': [
                        { teks: 'Apakah mual disertai muntah berulang?', label: 'Muntah berulang' },
                        { teks: 'Apakah Anda merasa sangat lemas?', label: 'Lemas' },
                        { teks: 'Apakah mual disertai nyeri perut hebat?', label: 'Nyeri perut' },
                        { teks: 'Apakah Anda mengalami dehidrasi (mulut kering)?', label: 'Dehidrasi' },
                        { teks: 'Apakah mual terjadi lebih dari 24 jam?', label: 'Mual >24 jam' }
                    ],
                    'Nyeri': [
                        { teks: 'Apakah nyeri terasa sangat hebat?', label: 'Nyeri hebat' },
                        { teks: 'Apakah nyeri membatasi gerakan Anda?', label: 'Nyeri membatasi gerak' },
                        { teks: 'Apakah nyeri disertai bengkak atau kemerahan?', label: 'Bengkak/kemerahan' },
                        { teks: 'Apakah nyeri menjalar ke bagian tubuh lain?', label: 'Nyeri menjalar' },
                        { teks: 'Apakah nyeri tidak membaik setelah istirahat?', label: 'Nyeri menetap' }
                    ],
                    'Lemas': [
                        { teks: 'Apakah lemas disertai pusing hebat?', label: 'Pusing hebat' },
                        { teks: 'Apakah Anda sulit berkonsentrasi?', label: 'Sulit fokus' },
                        { teks: 'Apakah lemas terjadi secara tiba-tiba?', label: 'Lemas mendadak' },
                        { teks: 'Apakah Anda kekurangan asupan makan/minum?', label: 'Kurang asupan' },
                        { teks: 'Apakah lemas berlangsung lebih dari 2 hari?', label: 'Lemas >2 hari' }
                    ],
                    'Lainnya': [
                        { teks: 'Apakah keluhan berlangsung lebih dari 3 hari?', label: 'Keluhan lama' },
                        { teks: 'Apakah keluhan mengganggu aktivitas sehari-hari?', label: 'Mengganggu aktivitas' },
                        { teks: 'Apakah disertai demam?', label: 'Demam' },
                        { teks: 'Apakah disertai mual atau muntah?', label: 'Mual/muntah' },
                        { teks: 'Apakah Anda merasa kondisi Anda memburuk?', label: 'Memburuk' }
                    ]
                },
                
                get pertanyaanAktif() {
                    return this.bankPertanyaan[this.keluhan] || this.bankPertanyaan['Lainnya'];
                },
                
                get tandaBahaya() {
                    let hasil = [];
                    this.jawaban.forEach((jwb, index) => {
                        if (jwb === true) {
                            hasil.push(this.pertanyaanAktif[index].label);
                        }
                    });
                    return hasil;
                },
                
                pilihKeluhan(k) {
                    this.keluhan = k;
                    this.jawaban = [null, null, null, null, null];
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
                
                ulangiSkrining() {
                    this.step = 1;
                    this.keluhan = '';
                    this.jawaban = [null, null, null, null, null];
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