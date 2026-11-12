<x-app-layout>
    <div class="max-w-3xl mx-auto w-full pb-24">
        
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-sigala-dark mb-2 tracking-tight">Profil & Pengaturan</h1>
            <p class="text-gray-500 text-base">Kelola informasi pribadi dan preferensi aplikasi Anda.</p>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm mb-6">
            <div class="bg-gradient-to-r from-blue-50 to-white p-6 sm:p-8 flex flex-col sm:flex-row items-center sm:items-start gap-6 border-b border-gray-100">
                <div class="relative shrink-0 w-24 h-24">
                    @if(Auth::user()->foto_profil)
                        <img src="{{ Storage::url(Auth::user()->foto_profil) }}" alt="Foto Profil" class="w-full h-full rounded-full object-cover border-4 border-white shadow-lg">
                    @else
                        <div class="w-full h-full bg-sigala-blue rounded-full flex items-center justify-center text-white text-4xl font-extrabold shadow-lg shadow-blue-200">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                    @endif
                    
                    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="absolute bottom-0 right-0 translate-x-1 translate-y-1">
                        @csrf
                        @method('PATCH')
                        <label for="foto_profil" class="cursor-pointer bg-white p-1.5 rounded-full shadow-md hover:bg-gray-100 transition border border-gray-100 flex items-center justify-center">
                            <svg class="w-4 h-4 text-sigala-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </label>
                        <input type="file" id="foto_profil" name="foto_profil" class="hidden" onchange="this.form.submit()">
                    </form>
                </div>
                <div class="text-center sm:text-left">
                    <h2 class="text-2xl font-extrabold text-sigala-dark">{{ Auth::user()->name }}</h2>
                    <p class="text-sm text-gray-500 mb-2">{{ Auth::user()->email }}</p>
                    <span class="inline-flex items-center text-xs font-bold text-teal-700 bg-teal-50 px-3 py-1 rounded-md border border-teal-100">
                        <span class="w-1.5 h-1.5 bg-teal-500 rounded-full mr-1.5"></span> Akun Terverifikasi
                    </span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm" x-data="{ edit: false }">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-sigala-dark">Data Pribadi</h3>
                    <button @click="edit = !edit" class="text-xs font-bold text-sigala-blue hover:underline" x-text="edit ? 'Batal' : 'Edit'"></button>
                </div>
                
                <div x-show="!edit" class="space-y-3 text-sm">
                    <div class="flex justify-between border-b border-gray-50 pb-2"><span class="text-gray-500">Usia</span> <span class="font-bold text-sigala-dark">{{ Auth::user()->usia ?? 'Belum diisi' }} Tahun</span></div>
                    <div class="flex justify-between border-b border-gray-50 pb-2"><span class="text-gray-500">Jenis Kelamin</span> <span class="font-bold text-sigala-dark">{{ Auth::user()->gender ?? 'Belum diisi' }}</span></div>
                    <div class="flex justify-between border-b border-gray-50 pb-2"><span class="text-gray-500">WhatsApp</span> <span class="font-bold text-sigala-dark">{{ Auth::user()->whatsapp ?? 'Belum diisi' }}</span></div>
                    <div class="flex justify-between pb-2"><span class="text-gray-500">Alamat</span> <span class="font-bold text-sigala-dark text-right max-w-[150px] truncate">{{ Auth::user()->alamat ?? 'Belum diisi' }}</span></div>
                </div>

                <form x-show="edit" action="{{ route('profil.update') }}" method="POST" class="space-y-3">
                    @csrf @method('PATCH')
                    <div><label class="text-xs text-gray-500">Usia</label><input type="number" name="usia" value="{{ Auth::user()->usia }}" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-200 text-sm"></div>
                    <div><label class="text-xs text-gray-500">Jenis Kelamin</label>
                        <select name="gender" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-200 text-sm">
                            <option value="Laki-laki" {{ Auth::user()->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ Auth::user()->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div><label class="text-xs text-gray-500">WhatsApp</label><input type="text" name="whatsapp" value="{{ Auth::user()->whatsapp }}" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-200 text-sm"></div>
                    <div><label class="text-xs text-gray-500">Alamat</label><textarea name="alamat" rows="2" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-200 text-sm">{{ Auth::user()->alamat }}</textarea></div>
                    <button type="submit" class="w-full py-2 bg-sigala-blue text-white text-xs font-bold rounded-lg mt-2">Simpan Data</button>
                </form>
            </div>

            <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm" x-data="{ edit: false }">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-bold text-sigala-dark">Informasi Kesehatan</h3>
                    <button @click="edit = !edit" class="text-xs font-bold text-sigala-blue hover:underline" x-text="edit ? 'Batal' : 'Edit'"></button>
                </div>
                
                <div x-show="!edit" class="space-y-3 text-sm">
                    <div class="flex justify-between border-b border-gray-50 pb-2"><span class="text-gray-500">Berat / Tinggi</span> <span class="font-bold text-sigala-dark">{{ Auth::user()->berat ?? '-' }} kg / {{ Auth::user()->tinggi ?? '-' }} cm</span></div>
                    <div class="flex justify-between border-b border-gray-50 pb-2"><span class="text-gray-500">Gol. Darah</span> <span class="font-bold text-red-500">{{ Auth::user()->golongan_darah ?? '-' }}</span></div>
                    <div class="flex justify-between border-b border-gray-50 pb-2"><span class="text-gray-500">Alergi</span> <span class="font-bold text-sigala-dark">{{ Auth::user()->alergi ?? 'Tidak ada' }}</span></div>
                    <div class="flex justify-between pb-2"><span class="text-gray-500">Riwayat Penyakit</span> <span class="font-bold text-sigala-dark">{{ Auth::user()->riwayat_penyakit ?? 'Tidak ada' }}</span></div>
                </div>

                <form x-show="edit" action="{{ route('profil.kesehatan.update') }}" method="POST" class="space-y-3">
                    @csrf @method('PATCH')
                    <div class="grid grid-cols-2 gap-2">
                        <div><label class="text-xs text-gray-500">Berat (kg)</label><input type="number" name="berat" value="{{ Auth::user()->berat }}" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-200 text-sm"></div>
                        <div><label class="text-xs text-gray-500">Tinggi (cm)</label><input type="number" name="tinggi" value="{{ Auth::user()->tinggi }}" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-200 text-sm"></div>
                    </div>
                    <div><label class="text-xs text-gray-500">Golongan Darah</label>
                        <select name="golongan_darah" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-200 text-sm">
                            <option value="A" {{ Auth::user()->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ Auth::user()->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                            <option value="AB" {{ Auth::user()->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                            <option value="O" {{ Auth::user()->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
                        </select>
                    </div>
                    <div><label class="text-xs text-gray-500">Alergi</label><input type="text" name="alergi" value="{{ Auth::user()->alergi }}" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-200 text-sm" placeholder="Pisahkan dengan koma"></div>
                    <div><label class="text-xs text-gray-500">Riwayat Penyakit</label><input type="text" name="riwayat_penyakit" value="{{ Auth::user()->riwayat_penyakit }}" class="w-full mt-1 px-3 py-2 rounded-lg border border-gray-200 text-sm"></div>
                    <button type="submit" class="w-full py-2 bg-sigala-blue text-white text-xs font-bold rounded-lg mt-2">Simpan Kesehatan</button>
                </form>
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

        <div class="mt-6 bg-white border border-gray-100 rounded-3xl p-6 shadow-sm">
            <h3 class="font-bold text-sigala-dark mb-4">Pengaturan Aplikasi</h3>
            <div class="space-y-1">
                <a href="{{ route('profil.notifikasi') }}" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-50 transition">
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
                
                <a href="{{ route('profil.privasi') }}" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-50 transition">
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

                <a href="{{ route('profil.bantuan') }}" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-50 transition">
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

                <a href="{{ route('profil.kartu-darurat') }}" class="flex items-center justify-between p-4 rounded-xl hover:bg-gray-50 transition border-t border-gray-50">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center mr-4">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path></svg>
                        </div>
                        <div>
                            <p class="font-bold text-sm text-sigala-dark">Kartu Darurat</p>
                            <p class="text-xs text-gray-500">Cetak kartu identitas kesehatan Anda</p>
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