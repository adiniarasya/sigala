<x-app-layout>
    <div class="max-w-xl mx-auto w-full" x-data="tasSiagaApp({{ $userItems->toJson() }})" x-init="init()">
        
        <div x-show="step === 1" x-transition class="flex flex-col min-h-[85vh]">
            <div class="flex items-center mb-6">
                <a href="{{ route('dashboard') }}" class="text-gray-500 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark ml-4">Tas Siaga</h1>
            </div>

            <div class="w-full h-56 bg-blue-50 rounded-3xl mb-8 flex items-center justify-center relative overflow-hidden border border-blue-100">
                <div class="text-8xl relative z-10">🎒</div>
            </div>

            <h2 class="text-2xl font-extrabold text-sigala-blue mb-4 leading-tight">Siapkan Tas Siaga untuk Keluarga Anda</h2>
            <p class="text-sm text-gray-500 mb-8">Pastikan semua kebutuhan penting sudah tersedia di tas siaga.</p>
            
            <div class="bg-blue-50/50 border border-blue-100 rounded-2xl p-6 mb-8 space-y-4">
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-4 font-bold text-sm">1</div>
                    <p class="text-sm font-bold text-sigala-dark">Siap dalam keadaan darurat</p>
                </div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-4 font-bold text-sm">2</div>
                    <p class="text-sm font-bold text-sigala-dark">Melindungi diri dari keluarga</p>
                </div>
                <div class="flex items-center">
                    <div class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-4 font-bold text-sm">3</div>
                    <p class="text-sm font-bold text-sigala-dark">Mempercepat proses evakuasi</p>
                </div>
            </div>

            <div class="mt-auto">
                <button @click="step = 2" class="w-full py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex justify-center items-center">
                    Mulai Cek <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </div>
        </div>

        <div x-show="step === 2" x-transition class="flex flex-col min-h-[85vh]">
            <div class="flex items-center mb-6">
                <a href="{{ route('dashboard') }}" class="text-gray-500 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark ml-4">Tas Siaga</h1>
            </div>

            <p class="text-sm font-bold text-sigala-blue mb-6">Pastikan semua kebutuhan penting sudah tersedia di tas siaga.</p>

            <div class="space-y-3 mb-8">
                <template x-for="(item, index) in daftarBarang" :key="index">
                    <div @click="toggleItem(index)" class="flex items-center p-4 bg-white border rounded-2xl cursor-pointer transition-all shadow-sm" :class="item.checked ? 'border-teal-200 bg-teal-50/30' : 'border-gray-100'">
                        
                        <div class="w-6 h-6 rounded border-2 flex items-center justify-center mr-4 transition-colors" :class="item.checked ? 'bg-teal-500 border-teal-500' : 'border-gray-300'">
                            <svg x-show="item.checked" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>

                        <div class="text-2xl mr-4" x-text="item.ikon"></div>
                        
                        <div class="flex-1">
                            <h3 class="text-sm font-bold text-sigala-dark" x-text="item.nama"></h3>
                        </div>
                    </div>
                </template>
            </div>

            <div class="mt-auto">
                <button @click="step = 3; simpanData()" class="w-full py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
                    Lanjutkan
                </button>
            </div>
        </div>

        <div x-show="step === 3" x-transition class="flex flex-col min-h-[85vh]">
            <div class="flex items-center mb-6">
                <a href="{{ route('dashboard') }}" class="text-gray-500 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark ml-4">Hasil Pemeriksaan</h1>
            </div>

            <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm mb-6 flex items-center">
                <div class="relative w-24 h-24 mr-6 shrink-0">
                    <svg class="w-full h-full transform -rotate-90" viewBox="0 0 36 36">
                        <path class="text-blue-100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
                        <path class="text-sigala-blue transition-all duration-1000 ease-out" :stroke-dasharray="`${(skor / 9) * 100}, 100`" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4" />
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-2xl font-black text-sigala-blue" x-text="skor + '/9'"></span>
                        <span class="text-[10px] text-gray-500">Item terpenuhi</span>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-extrabold text-sigala-dark mb-1" x-text="statusTeks"></h2>
                    <p class="text-xs text-gray-500 leading-relaxed" x-text="statusDeskripsi"></p>
                </div>
            </div>

            <div class="mb-6">
                <h3 class="text-sm font-bold text-sigala-blue mb-3">Rekomendasi</h3>
                <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm space-y-3">
                    <template x-for="(item, index) in daftarBarang" :key="index">
                        <div x-show="!item.checked" class="flex items-center text-sm text-gray-700">
                            <span class="text-red-500 mr-2">•</span>
                            <span x-text="item.nama"></span>
                        </div>
                    </template>
                    <p x-show="skor === 9" class="text-sm text-teal-600 font-semibold">Semua item sudah lengkap. Anda sangat siap!</p>
                </div>
            </div>

            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 flex items-start mb-6">
                <div class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-3 shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-xs text-sigala-dark leading-relaxed">Lengkapi kekurangan yang ada agar tas siaga Anda lebih optimal.</p>
            </div>

            <div class="mt-auto">
                <button @click="step = 4" class="w-full py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
                    Lihat Detail
                </button>
            </div>
        </div>

        <div x-show="step === 4" x-transition class="flex flex-col min-h-[85vh]">
            <div class="flex items-center mb-6">
                <a href="{{ route('dashboard') }}" class="text-gray-500 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark ml-4">Rekomendasi</h1>
            </div>

            <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 flex items-start mb-6">
                <div class="w-6 h-6 bg-sigala-blue text-white rounded-full flex items-center justify-center mr-3 shrink-0 mt-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <p class="text-sm text-sigala-dark font-semibold leading-relaxed">Siapkan sesuai kebutuhan keluarga Anda.</p>
            </div>

            <div class="space-y-4 mb-8">
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm flex items-center">
                    <div class="text-4xl mr-4">🔦</div>
                    <div>
                        <h3 class="font-bold text-sigala-dark text-sm">Senter</h3>
                        <p class="text-xs text-gray-500 mt-1">Pilih Senter yang tahan lama dan menggunakan baterai atau rechargeable.</p>
                    </div>
                </div>
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm flex items-center">
                    <div class="text-4xl mr-4">🔋</div>
                    <div>
                        <h3 class="font-bold text-sigala-dark text-sm">Power Bank</h3>
                        <p class="text-xs text-gray-500 mt-1">Minimal 10.000 mAh agar bisa mengisi daya beberapa perangkat.</p>
                    </div>
                </div>
                <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm flex items-center">
                    <div class="text-4xl mr-4">📄</div>
                    <div>
                        <h3 class="font-bold text-sigala-dark text-sm">Dokumen Penting</h3>
                        <p class="text-xs text-gray-500 mt-1">Simpan dalam plastik kedap air, berisi KTP, KK, BPJS, dan dokumen penting lainnya.</p>
                    </div>
                </div>
            </div>

            <div class="mt-auto">
                <button @click="step = 5" class="w-full py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition">
                    Lanjutkan
                </button>
            </div>
        </div>

        <div x-show="step === 5" x-transition class="flex flex-col min-h-[85vh]">
            <div class="flex items-center mb-6">
                <a href="{{ route('dashboard') }}" class="text-gray-500 bg-white p-2.5 rounded-xl border border-gray-200 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-sigala-dark ml-4">Tips Tambahan</h1>
            </div>

            <div class="w-full h-48 bg-blue-50 rounded-3xl mb-8 flex items-center justify-center relative overflow-hidden">
                <div class="text-8xl">🎒</div>
                <div class="absolute top-4 right-4 text-3xl">💡</div>
            </div>

            <h2 class="text-lg font-extrabold text-sigala-blue mb-4">Tips Menyiapkan Tas Siaga</h2>
            <div class="space-y-3 mb-8">
                <div class="bg-blue-50/50 rounded-xl p-4 flex items-center border border-blue-100">
                    <div class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center font-bold text-sm mr-4 shrink-0">1</div>
                    <p class="text-sm text-gray-700">Simpan di tempat yang mudah dijangkau.</p>
                </div>
                <div class="bg-blue-50/50 rounded-xl p-4 flex items-center border border-blue-100">
                    <div class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center font-bold text-sm mr-4 shrink-0">2</div>
                    <p class="text-sm text-gray-700">Periksa secara berkala, minimal setiap 3 bulan sekali.</p>
                </div>
                <div class="bg-blue-50/50 rounded-xl p-4 flex items-center border border-blue-100">
                    <div class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center font-bold text-sm mr-4 shrink-0">3</div>
                    <p class="text-sm text-gray-700">Sesuaikan dengan kebutuhan anggota keluarga (bayi, lansia, atau penyandang disabilitas)</p>
                </div>
                <div class="bg-blue-50/50 rounded-xl p-4 flex items-center border border-blue-100">
                    <div class="w-8 h-8 bg-sigala-blue text-white rounded-full flex items-center justify-center font-bold text-sm mr-4 shrink-0">4</div>
                    <p class="text-sm text-gray-700">Gunakan tas yang kuat, tahan air, dan nyaman dibawa.</p>
                </div>
            </div>

            <div class="mt-auto">
                <a href="{{ route('dashboard') }}" class="block w-full py-4 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition text-center">
                    Selesai
                </a>
            </div>
        </div>

    </div>

    <script>
        function tasSiagaApp(initialItems) {
            return {
                step: 1,
                skor: 0,
                daftarBarang: [],

                init() {
                    this.daftarBarang = initialItems.map(item => ({
                        id: item.id,
                        nama: item.item_name,
                        checked: !!item.is_checked,
                        ikon: getIcon(item.item_name)
                    }));
                    this.hitungSkor();
                },

                get statusTeks() {
                    if (this.skor >= 8) return 'Sangat Siap';
                    if (this.skor >= 5) return 'Cukup Siap';
                    return 'Belum Siap';
                },

                get statusDeskripsi() {
                    if (this.skor >= 8) return 'Semua kebutuhan penting sudah tersedia. Anda sangat siap!';
                    if (this.skor >= 5) return 'Beberapa kebutuhan penting sudah tersedia, namun masih ada yang perlu dilengkapi.';
                    return 'Banyak kebutuhan penting yang belum tersedia. Yuk, segera lengkapi!';
                },

                hitungSkor() {
                    this.skor = this.daftarBarang.filter(item => item.checked).length;
                },

                toggleItem(index) {
                    this.daftarBarang[index].checked = !this.daftarBarang[index].checked;
                    this.hitungSkor();

                    fetch('{{ route('tas-siaga.update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id: this.daftarBarang[index].id,
                            is_checked: this.daftarBarang[index].checked
                        })
                    });
                },

                simpanData() {
                }
            }
        }

        function getIcon(name) {
            const icons = {
                'Air Minum': '💧',
                'Makanan Siap Saji': '🥫',
                'Obat-obatan Pribadi': '💊',
                'Kotak P3K': '🧰',
                'Senter & Baterai': '🔦',
                'Power Bank': '🔋',
                'Dokumen Penting': '📄',
                'Pakaian Ganti': '👕',
                'Perlengkapan Kebersihan': '🧼'
            };
            return icons[name] || '📦';
        }
    </script>
</x-app-layout>