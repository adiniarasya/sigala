<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIGALA') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <meta name="theme-color" content="#1E66D0">
        <link rel="apple-touch-icon" href="/icon-192x192.png">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        
 <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    </head>
    <body class="font-sans antialiased bg-[#f8fafc] text-sigala-dark">
        
        <div class="flex h-screen overflow-hidden">

            <aside class="hidden md:flex flex-col w-72 bg-white border-r border-gray-100 h-full shrink-0 z-20 shadow-[4px_0_24px_rgba(0,0,0,0.02)]">
                <div class="flex items-center gap-3 px-8 py-8 border-b border-gray-50">
                    <div class="w-10 h-10 bg-gradient-to-br from-sigala-blue to-blue-500 rounded-xl flex items-center justify-center text-white font-extrabold text-xl shadow-lg shadow-blue-200/50">S</div>
                    <span class="font-extrabold text-2xl text-sigala-dark tracking-tight">SIGALA</span>
                </div>

                <nav class="flex-1 px-4 py-8 space-y-1.5 overflow-y-auto">

                    @if(Auth::user()->role === 'pengguna')
                        <p class="px-4 text-[11px] font-extrabold text-gray-400 mb-4 uppercase tracking-widest">Menu Utama</p>
                        
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-gradient-to-r from-blue-50 to-transparent text-sigala-blue border-l-4 border-sigala-blue shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span class="font-bold text-sm">Dashboard</span>
                        </a>
                        <a href="{{ route('edukasi.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('edukasi.*') ? 'bg-gradient-to-r from-blue-50 to-transparent text-sigala-blue border-l-4 border-sigala-blue shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            <span class="font-bold text-sm">Edukasi</span>
                        </a>
                        <a href="{{ route('cek-kondisi') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('cek-kondisi') ? 'bg-gradient-to-r from-blue-50 to-transparent text-sigala-blue border-l-4 border-sigala-blue shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            <span class="font-bold text-sm">Cek Kondisi</span>
                        </a>
                        <a href="{{ route('tas-siaga') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('tas-siaga') ? 'bg-gradient-to-r from-blue-50 to-transparent text-sigala-blue border-l-4 border-sigala-blue shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            <span class="font-bold text-sm">Tas Siaga</span>
                        </a>
                        <a href="{{ route('pertolongan.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('pertolongan.*') ? 'bg-gradient-to-r from-blue-50 to-transparent text-sigala-blue border-l-4 border-sigala-blue shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="font-bold text-sm">Pertolongan</span>
                        </a>
                        <a href="{{ route('konsultasi.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('konsultasi.*') ? 'bg-gradient-to-r from-blue-50 to-transparent text-sigala-blue border-l-4 border-sigala-blue shadow-sm' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            <span class="font-bold text-sm">Konsultasi</span>
                        </a>
                    @endif

                    @if(Auth::user()->role === 'perawat')
                        <p class="px-4 text-[11px] font-extrabold text-gray-400 mb-4 uppercase tracking-widest">Menu Perawat</p>
                        
                        <a href="{{ route('perawat.dashboard') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('perawat.dashboard') ? 'bg-blue-50 text-sigala-blue font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            <span class="font-bold text-sm">Dashboard</span>
                        </a>

                        <a href="{{ route('perawat.antrean') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('perawat.antrean') ? 'bg-blue-50 text-sigala-blue font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            <span class="font-bold text-sm">Antrean Konsultasi</span>
                        </a>
                        <a href="{{ route('perawat.riwayat') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('perawat.riwayat') ? 'bg-blue-50 text-sigala-blue font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span class="font-bold text-sm">Riwayat Pasien</span>
                        </a>
                    @endif

                    @if(Auth::user()->role === 'admin')
                        <p class="px-4 text-[11px] font-extrabold text-gray-400 mb-4 uppercase tracking-widest">Menu Admin</p>
                        
                        <a href="#" class="flex items-center px-4 py-3 rounded-xl bg-blue-50 text-sigala-blue font-bold">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            <span class="font-bold text-sm">Dashboard Admin</span>
                        </a>
                        <a href="{{ route('admin.pengguna') }}" class="flex items-center px-4 py-3 rounded-xl {{ request()->routeIs('admin.pengguna') ? 'bg-blue-50 text-sigala-blue font-bold' : 'text-gray-500 hover:bg-gray-50 hover:text-sigala-dark' }}">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                            <span class="font-bold text-sm">Kelola Pengguna</span>
                        </a>
                        <a href="#" class="flex items-center px-4 py-3 rounded-xl text-gray-500 hover:bg-gray-50 hover:text-sigala-dark">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                            <span class="font-bold text-sm">Kelola Konten</span>
                        </a>
                    @endif

                </nav>
            </aside>

            <div class="flex-1 flex flex-col h-full overflow-hidden relative">
                
                <header class="bg-white/80 backdrop-blur-md border-b border-gray-100 h-20 flex items-center justify-between px-4 md:px-8 shrink-0 z-30 sticky top-0">
                    <div class="flex items-center gap-2 md:hidden">
                        <div class="w-8 h-8 bg-sigala-blue rounded-lg flex items-center justify-center text-white font-extrabold text-sm">S</div>
                        <span class="font-extrabold text-lg text-sigala-dark">SIGALA</span>
                    </div>

                    <div class="hidden md:flex items-center bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 w-96 focus-within:ring-2 focus-within:ring-sigala-blue/20 focus-within:bg-white transition-all">
                        <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <input type="text" placeholder="Cari fitur..." class="bg-transparent border-none outline-none w-full text-sm text-sigala-dark placeholder-gray-400 focus:ring-0 p-0">
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="flex items-center gap-2 md:pl-4 md:border-l border-gray-200 relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-2 focus:outline-none">
                                <div class="text-right hidden sm:block">
                                    <p class="text-sm font-extrabold text-sigala-dark leading-tight">{{ Auth::user()->name }}</p>
                                    <p class="text-[11px] font-medium text-gray-500">{{ Auth::user()->email }}</p>
                                </div>
                                @if(Auth::user()->foto_profil)
                                    <img src="{{ Storage::url(Auth::user()->foto_profil) }}" alt="Foto" class="w-9 h-9 md:w-10 md:h-10 rounded-full object-cover border-2 border-white shadow-sm">
                                @else
                                    <div class="w-9 h-9 md:w-10 md:h-10 bg-gradient-to-br from-blue-100 to-blue-50 rounded-full flex items-center justify-center text-sigala-blue font-extrabold border-2 border-white shadow-sm">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </div>
                                @endif
                            </button>

                            <div x-show="open" @click.away="open = false" x-transition class="absolute top-12 right-0 w-56 bg-white border border-gray-100 rounded-2xl shadow-xl py-2 z-50">
                                <a href="{{ route('profil') }}" class="block px-5 py-2.5 text-sm font-semibold text-gray-600 hover:bg-gray-50">Profil & Pengaturan</a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-5 py-2.5 text-sm text-red-500 font-bold hover:bg-red-50">Keluar Akun</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>


                <main class="flex-1 overflow-y-auto p-4 md:p-10 pb-24 md:pb-10 relative bg-[#f8fafc]">
                    <div class="max-w-6xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>

                <nav class="md:hidden absolute bottom-0 w-full bg-white border-t border-gray-200 flex justify-around items-center h-16 px-1 shadow-[0_-4px_20px_rgba(0,0,0,0.05)] z-40">
                    <a href="{{ route('dashboard') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->routeIs('dashboard') ? 'text-sigala-blue' : 'text-gray-400' }}">
                        <svg class="w-5 h-5 mb-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        <span class="text-[10px] font-bold">Home</span>
                    </a>
                    <a href="{{ route('edukasi.index') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->routeIs('edukasi.*') ? 'text-sigala-blue' : 'text-gray-400' }}">
                        <svg class="w-5 h-5 mb-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
                        <span class="text-[10px] font-bold">Edukasi</span>
                    </a>
                    <a href="{{ route('cek-kondisi') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->routeIs('cek-kondisi') ? 'text-sigala-blue' : 'text-gray-400' }}">
                        <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        <span class="text-[10px] font-bold">Cek</span>
                    </a>
                    <a href="{{ route('konsultasi.index') }}" class="flex flex-col items-center justify-center w-full h-full {{ request()->routeIs('konsultasi.*') ? 'text-sigala-blue' : 'text-gray-400' }}">
                        <svg class="w-5 h-5 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        <span class="text-[10px] font-bold">Konsul</span>
                    </a>
                </nav>

            </div>
        </div>
    </body>
</html>