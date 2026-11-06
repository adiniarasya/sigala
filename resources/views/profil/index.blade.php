<x-app-layout>
    <div class="max-w-3xl mx-auto w-full">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-sigala-dark mb-2 tracking-tight">Profil & Pengaturan</h1>
            <p class="text-gray-500 text-base">Kelola informasi pribadi dan preferensi aplikasi Anda.</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm mb-6">
            <div class="bg-gradient-to-r from-blue-50 to-white p-8 flex items-center gap-6 border-b border-gray-100">
                <div class="w-24 h-24 bg-sigala-blue rounded-full flex items-center justify-center text-white text-4xl font-extrabold shadow-lg shadow-blue-200 shrink-0">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-sigala-dark">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-500 mb-2">{{ Auth::user()->email }}</p>
                    <span class="inline-flex items-center text-xs font-bold text-teal-700 bg-teal-50 px-3 py-1 rounded-md border border-teal-100">
                        <span class="w-1.5 h-1.5 bg-teal-500 rounded-full mr-1.5"></span> Akun Terverifikasi
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
                <h3 class="font-bold text-sigala-dark mb-4">Data Pribadi</h3>
                <div class="space-y-4">
                    <div class="flex items-center text-sm">
                        <span class="w-8 text-gray-400">📅</span>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500">Tanggal Lahir</p>
                            <p class="font-semibold text-sigala-dark">12 Januari 1969</p>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        <span class="w-8 text-gray-400">🚻</span>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500">Jenis Kelamin</p>
                            <p class="font-semibold text-sigala-dark">Laki-laki</p>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        <span class="w-8 text-gray-400">📞</span>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500">Nomor Telepon</p>
                            <p class="font-semibold text-sigala-dark">0812 4356 6688</p>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        <span class="w-8 text-gray-400">📍</span>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500">Alamat</p>
                            <p class="font-semibold text-sigala-dark">Jl. Melati No.10, Jakarta Pusat</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
                <h3 class="font-bold text-sigala-dark mb-4">Informasi Kesehatan</h3>
                <div class="space-y-4">
                    <div class="flex items-center text-sm">
                        <span class="w-8 text-gray-400">🩸</span>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500">Golongan Darah</p>
                            <p class="font-semibold text-sigala-dark">O+</p>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        <span class="w-8 text-gray-400">⚖️</span>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500">Berat & Tinggi</p>
                            <p class="font-semibold text-sigala-dark">65 kg / 160 cm</p>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        <span class="w-8 text-gray-400">🤧</span>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500">Alergi</p>
                            <p class="font-semibold text-sigala-dark">Tidak ada</p>
                        </div>
                    </div>
                    <div class="flex items-center text-sm">
                        <span class="w-8 text-gray-400">🏥</span>
                        <div class="flex-1">
                            <p class="text-xs text-gray-500">Riwayat Penyakit</p>
                            <p class="font-semibold text-sigala-dark">Tidak ada</p>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="mt-6 bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <h3 class="font-bold text-sigala-dark mb-4">Riwayat Cek Kondisi</h3>
            <div class="space-y-3">
                @forelse($screenings as $screening)
                    <div class="flex items-center justify-between p-4 rounded-xl border {{ $screening->is_danger ? 'border-red-100 bg-red-50/50' : 'border-teal-100 bg-teal-50/50' }}">
                        <div>
                            <p class="font-bold text-sm text-sigala-dark">{{ $screening->keluhan }}</p>
                            <p class="text-xs text-gray-500">{{ $screening->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <span class="text-xs font-bold px-3 py-1 rounded-md {{ $screening->is_danger ? 'bg-red-100 text-red-700' : 'bg-teal-100 text-teal-700' }}">
                            {{ $screening->is_danger ? 'Tanda Bahaya' : 'Aman' }}
                        </span>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 text-center py-4">Belum ada riwayat skrining.</p>
                @endforelse
            </div>
        </div>
        </div>

        <div class="mt-6 bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <h3 class="font-bold text-sigala-dark mb-4">Pengaturan Aplikasi</h3>
            <div class="space-y-1">
                <a href="#" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-50 transition">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-50 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-sigala-dark">Notifikasi</p>
                            <p class="text-xs text-gray-500">Atur notifikasi yang Anda terima</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
                
                <a href="#" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-50 transition">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-50 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-sigala-dark">Kebijakan Privasi</p>
                            <p class="text-xs text-gray-500">Baca kebijakan privasi kami</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>

                <a href="#" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-50 transition">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-50 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-sigala-dark">Bantuan & FAQ</p>
                            <p class="text-xs text-gray-500">Pertanyaan yang sering diajukan</p>
                        </div>
                    </div>
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <div class="mt-6 bg-red-50 border border-red-100 rounded-3xl p-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <div>
                <h3 class="font-bold text-red-800 text-sm">Keluar dari Akun</h3>
                <p class="text-red-600 text-xs mt-1">Anda perlu masuk kembali untuk mengakses fitur aplikasi.</p>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="w-full md:w-auto">
                @csrf
                <button type="submit" class="w-full md:w-auto px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-bold rounded-xl shadow-sm transition-colors">
                    Keluar Sekarang
                </button>
            </form>
        </div>

    </div>
</x-app-layout>