<x-app-layout>
    <div class="max-w-2xl mx-auto w-full" x-data="kesehatanForm()">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('profil') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Informasi Kesehatan</h1>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl p-6 md:p-8 shadow-sm">
            <div class="flex items-center mb-6">
                <div class="w-14 h-14 bg-teal-100 text-teal-600 rounded-full flex items-center justify-center mr-4">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-sigala-dark">Kondisi Kesehatan</h2>
                    <p class="text-xs text-gray-500">Kelola informasi kesehatan Anda di sini agar lebih aman dan tepat saat dibutuhkan.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Tinggi Badan (cm)</label>
                    <input type="number" x-model="tinggi" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm" placeholder="Contoh: 160">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Berat Badan (kg)</label>
                    <input type="number" x-model="berat" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm" placeholder="Contoh: 65">
                </div>
            </div>

            <div class="space-y-4 mb-8">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Riwayat Penyakit</label>
                    <input type="text" x-model="riwayat_penyakit" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm" placeholder="Contoh: Asma, Diabetes, dll">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Alergi</label>
                    <input type="text" x-model="alergi" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm" placeholder="Contoh: Debu, Kacang, dll">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Konsumsi Obat Rutin</label>
                    <input type="text" x-model="obat_rutin" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm" placeholder="Contoh: Obat tekanan darah">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kelompok Risiko</label>
                    <select x-model="kelompok_risiko" class="w-full rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 p-3 text-sm">
                        <option value="">Pilih...</option>
                        <option value="Risiko Rendah">Risiko Rendah</option>
                        <option value="Ibu Hamil">Ibu Hamil</option>
                        <option value="Lansia">Lansia</option>
                        <option value="Penyandang Disabilitas">Penyandang Disabilitas</option>
                        <option value="Penyakit Kronis">Penyakit Kronis</option>
                    </select>
                </div>
            </div>

            <button @click="simpanData()" :disabled="loading" class="w-full py-3.5 bg-sigala-blue text-white font-bold rounded-xl shadow-md hover:bg-blue-700 transition flex justify-center items-center">
                <span x-show="!loading">Simpan Informasi</span>
                <span x-show="loading">Menyimpan...</span>
            </button>
        </div>
    </div>

    <script>
        function kesehatanForm() {
            return {
                tinggi: '{{ Auth::user()->tinggi }}',
                berat: '{{ Auth::user()->berat }}',
                riwayat_penyakit: '{{ Auth::user()->riwayat_penyakit }}',
                alergi: '{{ Auth::user()->alergi }}',
                obat_rutin: '{{ Auth::user()->obat_rutin }}',
                kelompok_risiko: '{{ Auth::user()->kelompok_risiko }}',
                loading: false,

                simpanData() {
                    this.loading = true;
                    fetch('{{ route('profil.kesehatan.update') }}', {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            tinggi: this.tinggi,
                            berat: this.berat,
                            riwayat_penyakit: this.riwayat_penyakit,
                            alergi: this.alergi,
                            obat_rutin: this.obat_rutin,
                            kelompok_risiko: this.kelompok_risiko
                        })
                    }).then(() => {
                        this.loading = false;
                        alert('Informasi kesehatan berhasil disimpan!');
                    });
                }
            }
        }
    </script>
</x-app-layout>