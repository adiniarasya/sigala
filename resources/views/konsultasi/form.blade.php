<x-app-layout>
    <div class="max-w-2xl mx-auto w-full" x-data="konsultasiForm('{{ $jenis }}')">
        
        <div class="mb-6 flex items-center">
            <button x-show="step > 1" @click="step--" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <a x-show="step === 1" href="{{ route('konsultasi.jenis') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark" x-text="jenisKonsultasi"></h1>
        </div>

        <div class="mb-8 px-2">
            <div class="flex items-center justify-between relative max-w-xs mx-auto">
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-gray-200 -z-10 rounded-full"></div>
                <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-sigala-blue -z-10 rounded-full transition-all duration-300" :style="`width: ${((step - 1) / 2) * 100}%`"></div>
                
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm transition-colors" :class="step >= 1 ? 'bg-sigala-blue text-white shadow-md' : 'bg-gray-200 text-gray-400'">1</div>
                    <span class="text-[10px] font-bold mt-2 text-gray-500">Keluhan</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm transition-colors" :class="step >= 2 ? 'bg-sigala-blue text-white shadow-md' : 'bg-gray-200 text-gray-400'">2</div>
                    <span class="text-[10px] font-bold mt-2 text-gray-500">Data Diri</span>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm transition-colors" :class="step >= 3 ? 'bg-sigala-blue text-white shadow-md' : 'bg-gray-200 text-gray-400'">3</div>
                    <span class="text-[10px] font-bold mt-2 text-gray-500">Konfirmasi</span>
                </div>
            </div>
        </div>

        <div x-show="step === 1" x-transition class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-lg font-bold text-sigala-dark mb-4">Ceritakan Keluhan Anda</h2>
            <p class="text-xs text-gray-500 mb-4">Jelaskan secara singkat dan jelas mengenai keluhan yang Anda rasakan.</p>
            
            <div class="relative mb-6">
                <textarea x-model="keluhan" maxlength="500" rows="5" 
                    :placeholder="placeholderTeks" 
                    class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 transition-colors p-4 text-sm">
                </textarea>
                <p class="text-right text-xs text-gray-400 mt-1" x-text="keluhan.length + '/500'"></p>
            </div>

            <h3 class="text-sm font-bold text-sigala-dark mb-3">Apakah Anda mengalami gejala berikut?</h3>
            <div class="space-y-2 mb-8">
                <template x-for="gejala in daftarGejala" :key="gejala.nama">
                    <div @click="toggleGejala(gejala.nama)" class="flex items-center justify-between p-3 rounded-xl border cursor-pointer transition bg-gray-50" :class="gejalaDipilih.includes(gejala.nama) ? 'border-sigala-blue bg-blue-50 shadow-sm' : 'border-gray-200'">
                        <div class="flex items-center">
                            <span class="text-xl mr-3" x-text="gejala.ikon"></span>
                            <span class="text-sm font-semibold text-gray-700" x-text="gejala.nama"></span>
                        </div>
                        <div class="w-5 h-5 rounded border-2 flex items-center justify-center" :class="gejalaDipilih.includes(gejala.nama) ? 'bg-teal-500 border-teal-500' : 'border-gray-300'">
                            <svg x-show="gejalaDipilih.includes(gejala.nama)" class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                    </div>
                </template>
            </div>

            <button @click="if(keluhan) step = 2" :disabled="!keluhan" :class="!keluhan ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-700'" class="w-full py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md transition-all flex items-center justify-center">
                Lanjutkan <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </button>
        </div>

        <div x-show="step === 2" x-transition class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <h2 class="text-lg font-bold text-sigala-dark mb-1">Data Diri Anda</h2>
            <p class="text-xs text-gray-500 mb-6">Pastikan data yang Anda masukkan sudah benar.</p>

            <div class="space-y-5 mb-8">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" x-model="nama" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm" placeholder="Masukkan nama lengkap">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Usia</label>
                        <input type="number" x-model="usia" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm" placeholder="Masukkan usia">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">Jenis Kelamin</label>
                        <select x-model="gender" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm">
                            <option value="">Pilih...</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">No. WhatsApp Aktif</label>
                    <input type="tel" x-model="whatsapp" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm" placeholder="08xxxxxxxxxx">
                </div>
            </div>

            <div class="flex gap-3">
                <button @click="step--" class="w-1/3 py-4 border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition">Kembali</button>
                <button @click="if(nama && usia && gender && whatsapp) step = 3" :disabled="!nama || !usia || !gender || !whatsapp" :class="(!nama || !usia || !gender || !whatsapp) ? 'opacity-50 cursor-not-allowed' : 'hover:bg-blue-700'" class="w-2/3 py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md transition-all flex justify-center items-center">
                    Lanjutkan <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </div>

        <div x-show="step === 3" x-transition class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
            <p class="text-xs text-gray-500 mb-6 text-center">Pastikan data yang Anda masukkan sudah benar.</p>

            <div class="bg-gray-50 border border-gray-100 shadow-sm rounded-2xl p-6 mb-6">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 bg-purple-500 text-white rounded-full flex items-center justify-center mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-sigala-dark text-sm">Ringkasan Konsultasi</h3>
                </div>
                
                <div class="space-y-4">
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Jenis Konsultasi</p>
                        <p class="text-sm font-semibold text-sigala-dark" x-text="jenisKonsultasi"></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Keluhan</p>
                        <p class="text-sm text-sigala-dark leading-relaxed" x-text="keluhan"></p>
                        <p class="text-xs text-gray-500 mt-1" x-show="gejalaDipilih.length > 0">Gejala: <span x-text="gejalaDipilih.join(', ')"></span></p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 mb-1">Data Diri</p>
                        <ul class="text-sm text-sigala-dark list-disc list-inside space-y-1 mt-1">
                            <li x-text="nama"></li>
                            <li x-text="gender + ', ' + usia + ' Tahun'"></li>
                            <li x-text="whatsapp"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex items-start mb-8">
                <div class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-3 shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-xs text-sigala-dark leading-relaxed">Setelah menekan tombol kirim, Anda akan segera terhubung dengan perawat. Mohon pastikan koneksi internet Anda stabil.</p>
            </div>

            <div class="flex gap-3">
                <button @click="step--" class="w-1/3 py-4 border border-gray-300 text-gray-700 font-bold rounded-xl hover:bg-gray-50 transition">Kembali</button>
                <button @click="kirimKonsultasi()" :disabled="loading" class="w-2/3 py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex justify-center items-center">
                    <span x-show="!loading">Kirim & Hubungi Perawat</span>
                    <span x-show="loading">Memproses...</span>
                </button>
            </div>
        </div>
    </div>

    <script>
        function konsultasiForm(jenisAwal) {
            let gejalaDefault = [];
            let placeholderDefault = '';

            if (jenisAwal.includes('Bencana')) {
                gejalaDefault = [
                    { nama: 'Luka / Pendarahan', ikon: '🩸' },
                    { nama: 'Patah Tulang', ikon: '🦴' },
                    { nama: 'Dehidrasi', ikon: '💧' },
                    { nama: 'Sesak Napas', ikon: '🫁' },
                    { nama: 'Trauma / Stres', ikon: '🧠' },
                ];
                placeholderDefault = 'Contoh: Terkena reruntuhan, luka di kaki, dan merasa pusing...';
            } else if (jenisAwal.includes('Skrining')) {
                gejalaDefault = [
                    { nama: 'Sesak Napas', ikon: '🫁' },
                    { nama: 'Nyeri Dada', ikon: '❤️' },
                    { nama: 'Pusing Hebat', ikon: '🤕' },
                    { nama: 'Mual / Muntah', ikon: '🤢' },
                    { nama: 'Lemas', ikon: '🥱' },
                ];
                placeholderDefault = 'Contoh: Saya ingin menanyakan hasil skrining saya yang menunjukkan tanda bahaya...';
            } else {
                gejalaDefault = [
                    { nama: 'Demam', ikon: '🤒' },
                    { nama: 'Batuk', ikon: '😷' },
                    { nama: 'Pilek', ikon: '🤧' },
                    { nama: 'Sakit Kepala', ikon: '🤕' },
                    { nama: 'Sesak Napas', ikon: '🫁' },
                ];
                placeholderDefault = 'Contoh: Demam sejak 2 hari yang lalu, disertai batuk dan pilek...';
            }

            return {
                step: 1,
                loading: false,
                jenisKonsultasi: jenisAwal,
                keluhan: '',
                gejalaDipilih: [],
                nama: '{{ Auth::user()->name }}',
                usia: '',
                gender: '',
                whatsapp: '',
                daftarGejala: gejalaDefault,
                placeholderTeks: placeholderDefault,
                
                toggleGejala(nama) {
                    if (this.gejalaDipilih.includes(nama)) {
                        this.gejalaDipilih = this.gejalaDipilih.filter(g => g !== nama);
                    } else {
                        this.gejalaDipilih.push(nama);
                    }
                },
                kirimKonsultasi() {
                    this.loading = true;
                    let fullKeluhan = this.keluhan + (this.gejalaDipilih.length > 0 ? ' | Gejala: ' + this.gejalaDipilih.join(', ') : '');
                    
                    fetch('{{ route('konsultasi.start') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ 
                            keluhan: fullKeluhan,
                            jenis: this.jenisKonsultasi
                        })
                    }).then(res => res.json()).then(data => {
                        if (data.success) {
                            window.location.href = "{{ url('/konsultasi/chat') }}/" + data.id;
                        }
                    });
                }
            }
        }
    </script>
</x-app-layout>