<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIGALA - Siaga Bencana & Layanan Kesehatan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#1E66D0">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-sigala.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-grid { background-image: radial-gradient(#cbd5e1 1px, transparent 1px); background-size: 24px 24px; }
        .glass-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); }

        #splash-screen {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background-color: rgba(5, 5, 5, 0.6);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: opacity 0.8s ease-in-out, visibility 0.8s ease-in-out, background-color 0.8s, backdrop-filter 0.8s;
            overflow: hidden;
        }

        #splash-screen.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            background-color: rgba(5, 5, 5, 0);
            backdrop-filter: blur(0px);
            -webkit-backdrop-filter: blur(0px);
        }

        .grid-overlay {
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: 0;
            mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
            -webkit-mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
        }

        .glow-orb {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(37,99,235,0.3) 0%, rgba(0,0,0,0) 70%);
            border-radius: 50%;
            z-index: 1;
            animation: breathe 4s infinite alternate ease-in-out;
        }

        @keyframes breathe {
            0% { transform: scale(0.9); opacity: 0.5; }
            100% { transform: scale(1.1); opacity: 1; }
        }

        .splash-logo-container {
            position: relative;
            width: 250px;
            height: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2;
            margin-bottom: 2rem;
        }

        .orbit-ring {
            position: absolute;
            inset: 0;
            border: 1px dashed rgba(59, 130, 246, 0.3);
            border-radius: 50%;
            animation: spin 20s linear infinite;
            transition: opacity 0.5s ease;
        }
        
        .orbit-ring::before {
            content: '';
            position: absolute;
            top: -4px;
            left: 50%;
            width: 8px;
            height: 8px;
            background-color: #3b82f6;
            border-radius: 50%;
            box-shadow: 0 0 10px #3b82f6, 0 0 20px #3b82f6;
        }

        .orbit-ring-2 {
            position: absolute;
            inset: 20px;
            border: 1px solid rgba(59, 130, 246, 0.1);
            border-radius: 50%;
            animation: spin 15s linear infinite reverse;
            transition: opacity 0.5s ease;
        }

        @keyframes spin {
            100% { transform: rotate(360deg); }
        }

        .splash-logo {
            width: 120px;
            height: auto;
            z-index: 5;
            filter: drop-shadow(0 0 20px rgba(59, 130, 246, 0.6));
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-10px) scale(1.02); }
        }

        .splash-content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeIn 1.5s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        @keyframes fadeIn {
            100% { opacity: 1; transform: translateY(0); }
        }

        .splash-title {
            font-size: 2rem;
            font-weight: 800;
            color: #ffffff;
            letter-spacing: 0.3em;
            margin-bottom: 0.25rem;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.4);
            padding-left: 0.3em;
        }

        .splash-subtitle {
            font-size: 0.75rem;
            font-weight: 600;
            color: #60a5fa;
            letter-spacing: 0.15em;
            margin-bottom: 2.5rem;
            text-transform: uppercase;
        }

        .loading-container {
            width: 200px;
            height: 4px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 999px;
            overflow: hidden;
            position: relative;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.5);
        }

        .loading-bar {
            height: 100%;
            background: linear-gradient(90deg, #1d4ed8, #3b82f6, #60a5fa);
            width: 0%;
            border-radius: 999px;
            animation: load 4s cubic-bezier(0.1, 0.8, 0.2, 1) forwards;
            box-shadow: 0 0 15px #3b82f6;
            position: relative;
        }

        .loading-bar::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 20px;
            background: #ffffff;
            filter: blur(4px);
            opacity: 0.8;
        }

        @keyframes load {
            0% { width: 0%; }
            40% { width: 30%; }
            70% { width: 70%; }
            100% { width: 100%; }
        }

        .loading-text {
            font-size: 0.65rem;
            color: #64748b;
            font-weight: 500;
            letter-spacing: 0.2em;
            margin-top: 1.25rem;
            text-transform: uppercase;
        }

        .splash-exit .splash-logo {
            animation: none;
        }
        .splash-exit .orbit-ring,
        .splash-exit .orbit-ring-2 {
            opacity: 0;
        }
        .splash-exit .splash-content {
            opacity: 0;
            transform: translateY(-20px);
        }

        .modal-hidden {
            opacity: 0;
            pointer-events: none;
            transform: scale(0.95);
        }

        .modal-visible {
            opacity: 1;
            pointer-events: auto;
            transform: scale(1);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out, padding 0.3s ease-in-out;
        }
        
        .faq-answer.active {
            max-height: 200px;
            padding-top: 1rem;
        }

        .faq-icon {
            transition: transform 0.3s ease-in-out;
        }
        
        .faq-icon.active {
            transform: rotate(180deg);
        }
    </style>
</head>
<body class="antialiased text-gray-900 bg-[#f8fafc] overflow-x-hidden">

    <div id="splash-screen">
        <div class="grid-overlay"></div>
        <div class="glow-orb"></div>
        
        <div class="splash-content">
            <div class="splash-logo-container" id="splash-logo-wrapper">
                <div class="orbit-ring"></div>
                <div class="orbit-ring-2"></div>
                <img src="{{ asset('images/logo-sigala.png') }}" alt="Logo SIGALA" class="splash-logo" id="splash-logo">
            </div>
            
            <div class="splash-title">SIGALA</div>
            <div class="splash-subtitle">Siaga Bencana</div>
            
            <div class="loading-container">
                <div class="loading-bar"></div>
            </div>
            
            <p class="loading-text">Menginisialisasi Sistem...</p>
        </div>
    </div>

    <div id="fitur-modal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm transition-all duration-300 modal-hidden">
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all duration-300" id="modal-content">
            <div id="modal-header" class="bg-blue-600 p-6 flex items-start justify-between">
                <div>
                    <h3 id="modal-title" class="text-xl font-bold text-white mb-1">Judul Fitur</h3>
                    <p id="modal-subtitle" class="text-blue-100 text-sm">Deskripsi Singkat</p>
                </div>
                <button onclick="closeModal()" class="text-white/70 hover:text-white transition">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            <div class="p-6 text-gray-600 leading-relaxed text-sm" id="modal-body">
                Konten detail fitur akan muncul di sini.
            </div>
            <div class="p-6 bg-gray-50 border-t border-gray-100 flex justify-end">
                <button onclick="closeModal()" class="px-5 py-2.5 bg-gray-200 text-gray-800 font-bold rounded-xl text-sm hover:bg-gray-300 transition">Tutup</button>
            </div>
        </div>
    </div>

    <nav class="fixed inset-x-0 top-0 z-50 glass-card border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 sm:h-20">
                
                <a href="{{ url('/') }}" class="flex items-center gap-2 shrink-0">
                    <img src="{{ asset('images/logo-sigala.png') }}" alt="Logo SIGALA" class="w-8 h-8 sm:w-10 sm:h-10 object-contain">
                    <span class="font-extrabold text-xl sm:text-2xl tracking-tight text-blue-600">SIGALA</span>
                </a>

                <div class="hidden md:flex items-center gap-3">
                    <a href="#fitur" class="px-4 py-2.5 rounded-xl text-gray-600 font-bold text-sm hover:text-blue-600 transition">Fitur</a>
                    <a href="#cara-kerja" class="px-4 py-2.5 rounded-xl text-gray-600 font-bold text-sm hover:text-blue-600 transition">Cara Kerja</a>
                    <a href="#faq" class="px-4 py-2.5 rounded-xl text-gray-600 font-bold text-sm hover:text-blue-600 transition">FAQ</a>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="ml-2 px-5 py-2.5 rounded-xl bg-blue-600 text-white font-bold text-sm hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                                Ke Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="ml-2 px-4 py-2.5 rounded-xl text-gray-700 font-bold text-sm hover:text-blue-600 transition">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-xl bg-blue-600 text-white font-bold text-sm hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                                    Daftar
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>

                <button id="mobile-menu-btn" type="button" class="md:hidden p-2 text-gray-600 hover:bg-gray-100 rounded-lg" aria-label="Buka menu">
                    <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="md:hidden hidden border-t border-gray-200 bg-white">
            <div class="px-4 py-4 space-y-2">
                <a href="#fitur" class="block px-4 py-3 rounded-xl text-gray-700 font-bold text-sm hover:bg-gray-50 transition">Fitur</a>
                <a href="#cara-kerja" class="block px-4 py-3 rounded-xl text-gray-700 font-bold text-sm hover:bg-gray-50 transition">Cara Kerja</a>
                <a href="#faq" class="block px-4 py-3 rounded-xl text-gray-700 font-bold text-sm hover:bg-gray-50 transition">FAQ</a>
                <div class="border-t border-gray-100 my-2 pt-2 space-y-2">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block w-full text-center px-5 py-3.5 rounded-xl bg-blue-600 text-white font-bold text-sm hover:bg-blue-700 transition">
                                Ke Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="block w-full text-center px-5 py-3.5 rounded-xl text-gray-700 font-bold text-sm hover:bg-gray-50 transition border border-gray-200">
                                Masuk
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block w-full text-center px-5 py-3.5 rounded-xl bg-blue-600 text-white font-bold text-sm hover:bg-blue-700 transition">
                                    Daftar
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <header class="relative pt-28 pb-16 sm:pt-36 sm:pb-24 bg-grid">
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-3xl h-64 bg-blue-400/10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col-reverse lg:flex-row lg:items-center gap-10 lg:gap-12">

                <div class="w-full lg:w-1/2 text-center lg:text-left">
                    <span class="inline-block py-1.5 px-3.5 rounded-full bg-blue-50 text-blue-600 text-[11px] sm:text-xs font-bold tracking-wide mb-4 sm:mb-5 border border-blue-100">
                        Sistem Siaga Bencana Terpadu
                    </span>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-extrabold text-gray-900 leading-[1.15] mb-4 sm:mb-5">
                        Lebih siap hadapi bencana, <span class="text-blue-600">mulai dari langkah kecil.</span>
                    </h1>

                    <p class="text-sm sm:text-base lg:text-lg text-gray-500 mb-8 max-w-lg mx-auto lg:mx-0 leading-relaxed px-2 sm:px-0">
                        SIGALA membantu Anda memahami risiko, menyiapkan kebutuhan darurat, dan mendapatkan pertolongan pertama — semuanya dalam satu tempat.
                    </p>

                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center justify-center lg:justify-start gap-3 w-full sm:w-auto px-4 sm:px-0">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="w-full sm:w-auto px-7 py-3.5 bg-blue-600 text-white font-bold text-sm sm:text-base rounded-xl shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-0.5 transition-all flex items-center justify-center gap-2">
                                Mulai Sekarang
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        @endif
                        <a href="#cara-kerja" class="w-full sm:w-auto px-7 py-3.5 bg-white text-gray-800 font-bold text-sm sm:text-base rounded-xl border border-gray-300 shadow-sm hover:bg-gray-50 transition flex items-center justify-center">
                            Pelajari Cara Kerja
                        </a>
                    </div>

                    <div class="mt-10 flex items-center justify-center lg:justify-start gap-8 border-t border-gray-200 pt-6 px-4 sm:px-0">
                        <div>
                            <p class="text-xl sm:text-2xl font-black text-gray-900">24/7</p>
                            <p class="text-[11px] sm:text-xs text-gray-500 font-semibold uppercase tracking-wider">Layanan AI</p>
                        </div>
                        <div class="w-px h-8 bg-gray-300"></div>
                        <div>
                            <p class="text-xl sm:text-2xl font-black text-gray-900">100+</p>
                            <p class="text-[11px] sm:text-xs text-gray-500 font-semibold uppercase tracking-wider">Artikel Medis</p>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 relative mx-auto max-w-[280px] sm:max-w-md lg:max-w-none mb-8 lg:mb-0">
                    <div class="absolute inset-4 bg-gradient-to-tr from-blue-500 to-cyan-400 rounded-3xl rotate-3 opacity-20 blur-xl pointer-events-none"></div>
                    
                    <div class="relative bg-white p-2 sm:p-3 rounded-2xl sm:rounded-3xl shadow-xl border border-gray-100">
                        <img src="{{ asset('images/edukasi-tas-siaga.png') }}" alt="Ilustrasi tas siaga bencana" class="w-full h-auto rounded-xl sm:rounded-2xl object-cover">
                        
                        <div class="absolute -bottom-5 left-1/2 -translate-x-1/2 sm:left-auto sm:translate-x-0 sm:-bottom-6 sm:-left-6 glass-card px-4 py-2.5 sm:px-5 sm:py-4 rounded-xl sm:rounded-2xl shadow-xl flex items-center gap-3 border border-gray-100 w-max">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 bg-green-100 text-green-600 rounded-full flex items-center justify-center shrink-0">
                                <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-[10px] sm:text-xs text-gray-500 font-bold">Status Sistem</p>
                                <p class="text-xs sm:text-sm font-black text-gray-900">Siaga &amp; Normal</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <section id="fitur" class="py-16 sm:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-16">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 mb-3">
                    Yang Anda butuhkan saat darurat
                </h2>
                <p class="text-gray-500 text-sm sm:text-base px-4 sm:px-0">
                    Klik kartu di bawah untuk melihat detail fitur.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                
                <button onclick="openModal('Edukasi Bencana', 'Modul interaktif tentang jenis bencana, mitigasi, dan langkah pencegahan.', 'Pelajari berbagai jenis bencana alam yang ada di Indonesia, mulai dari gempa bumi, tsunami, letusan gunung berapi, hingga banjir. Kami menyediakan modul interaktif yang memandu Anda memahami cara mitigasi dan tindakan preventif sebelum bencana terjadi.')" class="text-left group block bg-white p-5 sm:p-7 rounded-2xl border border-gray-200 hover:shadow-xl hover:border-blue-300 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4 sm:mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">Edukasi Bencana</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Modul interaktif tentang jenis bencana, mitigasi, dan langkah pencegahan.</p>
                </button>

                <button onclick="openModal('Pertolongan Pertama', 'Panduan praktis menangani luka, pingsan, dan pendarahan di situasi darurat.', 'Akses panduan langkah-demi-langkah untuk pertolongan pertama. Mulai dari cara menghentikan pendarahan, menangani luka bakar ringan, hingga memberikan bantuan pada korban yang pingsan. Dilengkapi dengan ilustrasi dan instruksi yang mudah diikuti.')" class="text-left group block bg-white p-5 sm:p-7 rounded-2xl border border-gray-200 hover:shadow-xl hover:border-red-300 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center mb-4 sm:mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-2 group-hover:text-red-600 transition-colors">Pertolongan Pertama</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Panduan praktis menangani luka, pingsan, dan pendarahan di situasi darurat.</p>
                </button>

                <button onclick="openModal('Skrining Kesehatan', 'Cek kondisi awal secara mandiri untuk deteksi dini gejala berbahaya.', 'Lakukan skrining kesehatan mandiri untuk mengetahui kondisi tubuh Anda. Jawab beberapa pertanyaan sederhana tentang gejala yang Anda rasakan, dan dapatkan rekomendasi awal apakah Anda perlu segera mencari bantuan medis atau bisa ditangani di rumah.')" class="text-left group block bg-white p-5 sm:p-7 rounded-2xl border border-gray-200 hover:shadow-xl hover:border-teal-300 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-xl flex items-center justify-center mb-4 sm:mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-2 group-hover:text-teal-600 transition-colors">Skrining Kesehatan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Cek kondisi awal secara mandiri untuk deteksi dini gejala berbahaya.</p>
                </button>

                <button onclick="openModal('Konsultasi Perawat', 'Terhubung dengan tenaga medis terlatih secara real-time saat dibutuhkan.', 'Fitur ini memungkinkan Anda berkonsultasi langsung dengan perawat atau tenaga medis terlatih melalui fitur chat. Cocok digunakan ketika Anda membutuhkan saran medis cepat, tindak lanjut pasca-skrining, atau sekadar memastikan gejala yang dirasakan.')" class="text-left group block bg-white p-5 sm:p-7 rounded-2xl border border-gray-200 hover:shadow-xl hover:border-purple-300 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center mb-4 sm:mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">Konsultasi Perawat</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Terhubung dengan tenaga medis terlatih secara real-time saat dibutuhkan.</p>
                </button>

                <button onclick="openModal('Tas Siaga Digital', 'Checklist perlengkapan darurat yang bisa dipantau kapan saja dan di mana saja.', 'Siapkan tas siaga bencana Anda dengan panduan checklist digital. Fitur ini membantu Anda memastikan semua perlengkapan penting—seperti obat-obatan, dokumen, air minum, dan alat komunikasi—sudah lengkap dan siap digunakan jika terjadi keadaan darurat.')" class="text-left group block bg-white p-5 sm:p-7 rounded-2xl border border-gray-200 hover:shadow-xl hover:border-orange-300 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center mb-4 sm:mb-5 group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    </div>
                    <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-2 group-hover:text-orange-600 transition-colors">Tas Siaga Digital</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Checklist perlengkapan darurat yang bisa dipantau kapan saja dan di mana saja.</p>
                </button>

                <button onclick="openModal('AI Asisten (Siggy)', 'Kenalan sama Si Siggy! Asisten pintar yang siap jawab pertanyaan darurat Anda kapan pun.', 'Si Siggy adalah asisten cerdas berbasis AI yang dikembangkan khusus untuk SIGALA. Dia bisa membantu Anda memberikan panduan evakuasi cepat, menjawab pertanyaan medis dasar, hingga memberikan instruksi pertolongan pertama saat Anda panik. Si Siggy siap 24/7 menemani Anda dan keluarga.')" class="text-left group block bg-white p-5 sm:p-7 rounded-2xl border border-gray-200 hover:shadow-xl hover:border-blue-300 hover:-translate-y-1 transition duration-300 relative overflow-hidden">
                    <div class="relative z-10 flex justify-between items-start mb-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="w-14 h-14 bg-white rounded-full p-1 shadow-md border border-gray-100 -mt-2 -mr-2 group-hover:scale-105 transition-transform">
                            <img src="{{ asset('images/siggy.png') }}" alt="Si Siggy" class="w-full h-full object-cover rounded-full bg-blue-50" onerror="this.src='https://ui-avatars.com/api/?name=Siggy&background=0D8ABC&color=fff'">
                        </div>
                    </div>
                    
                    <div class="relative z-10">
                        <span class="inline-block py-1 px-2.5 rounded-md bg-blue-100 text-blue-700 text-[10px] font-extrabold tracking-wider mb-2">AI SIGALA</span>
                        <h3 class="text-base sm:text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">AI Asisten (Siggy)</h3>
                        <p class="text-sm text-gray-500 leading-relaxed">Kenalan sama <strong>Si Siggy!</strong> Asisten pintar yang siap jawab pertanyaan darurat Anda kapan pun.</p>
                    </div>
                </button>

            </div>
        </div>
    </section>

    <section id="cara-kerja" class="py-16 sm:py-24 bg-[#f8fafc] border-y border-gray-200 relative overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-blue-100/50 rounded-full blur-3xl pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-12 sm:mb-20">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 mb-3">
                    Bagaimana SIGALA Membantu Anda?
                </h2>
                <p class="text-gray-500 text-sm sm:text-base">
                    Panduan mudah bagi masyarakat untuk mulai menggunakan layanan siaga bencana.
                </p>
            </div>
            <div class="relative">
                <div class="hidden md:block absolute top-8 left-[10%] right-[10%] h-0.5 bg-gray-200 z-0"></div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-8">
                    <div class="relative text-center group">
                        <div class="w-16 h-16 mx-auto bg-white border-4 border-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl font-black mb-5 relative z-10 group-hover:scale-110 group-hover:border-blue-300 transition-all shadow-sm">1</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Daftar Akun</h3>
                        <p class="text-sm text-gray-500 leading-relaxed max-w-xs mx-auto">Buat akun masyarakat untuk mengakses fitur secara personal dan menyimpan riwayat kesehatan Anda.</p>
                    </div>
                    <div class="relative text-center group">
                        <div class="w-16 h-16 mx-auto bg-white border-4 border-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl font-black mb-5 relative z-10 group-hover:scale-110 group-hover:border-blue-300 transition-all shadow-sm">2</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Akses Fitur Darurat</h3>
                        <p class="text-sm text-gray-500 leading-relaxed max-w-xs mx-auto">Cek tas siaga Anda, tanyakan gejala ke AI Siggy, atau baca panduan pertolongan pertama dari Dasbor.</p>
                    </div>
                    <div class="relative text-center group">
                        <div class="w-16 h-16 mx-auto bg-white border-4 border-blue-100 text-blue-600 rounded-full flex items-center justify-center text-xl font-black mb-5 relative z-10 group-hover:scale-110 group-hover:border-blue-300 transition-all shadow-sm">3</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Konsultasi Medis</h3>
                        <p class="text-sm text-gray-500 leading-relaxed max-w-xs mx-auto">Hubungi perawat secara langsung jika Anda butuh bantuan medis atau tindak lanjut dari skrining.</p>
                    </div>
                </div>
            </div>
            <div class="mt-16 text-center">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-6 py-3.5 bg-white border border-gray-300 text-gray-800 font-bold rounded-xl shadow-sm hover:bg-gray-50 hover:-translate-y-0.5 transition-all">
                        Siap Mencoba? Daftar Sekarang
                    </a>
                @endif
            </div>
        </div>
    </section>

    <section id="faq" class="py-16 sm:py-24 bg-white relative">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 mb-3">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="text-gray-500 text-sm sm:text-base">
                    Belum yakin? Cek beberapa pertanyaan populer di bawah ini.
                </p>
            </div>

            <div class="space-y-4">
                <div class="border border-gray-200 rounded-2xl overflow-hidden bg-gray-50">
                    <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                        <span class="font-bold text-gray-900 text-sm sm:text-base">Apakah aplikasi SIGALA ini gratis?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer px-5 text-sm text-gray-600 leading-relaxed">
                        Ya, fitur dasar seperti edukasi bencana, tas siaga digital, dan skrining mandiri sepenuhnya gratis. Kami percaya kesiapsiagaan adalah hak semua orang.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-2xl overflow-hidden bg-gray-50">
                    <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                        <span class="font-bold text-gray-900 text-sm sm:text-base">Bagaimana cara saya berkonsultasi dengan perawat?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer px-5 text-sm text-gray-600 leading-relaxed">
                        Setelah Anda mendaftar dan masuk (login), buka menu "Konsultasi Perawat" di Dasbor. Anda akan terhubung ke ruang chat dengan perawat jaga yang siap membantu secara real-time.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-2xl overflow-hidden bg-gray-50">
                    <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                        <span class="font-bold text-gray-900 text-sm sm:text-base">Apakah data pribadi dan riwayat kesehatan saya aman?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer px-5 text-sm text-gray-600 leading-relaxed">
                        Sangat aman. SIGALA menggunakan sistem enkripsi berlapis untuk melindungi semua data pribadi Anda. Kami tidak akan pernah membagikan data Anda kepada pihak ketiga tanpa izin.
                    </div>
                </div>

                <div class="border border-gray-200 rounded-2xl overflow-hidden bg-gray-50">
                    <button onclick="toggleFaq(this)" class="w-full flex justify-between items-center p-5 text-left focus:outline-none">
                        <span class="font-bold text-gray-900 text-sm sm:text-base">Siapa itu Si Siggy dan apa bedanya dengan chatbot biasa?</span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="faq-answer px-5 text-sm text-gray-600 leading-relaxed">
                        Si Siggy adalah asisten AI cerdas yang dilatih khusus dengan protokol medis darurat dan kebencanaan. Dia bisa memahami konteks pertanyaan Anda dan memberikan panduan yang lebih terstruktur dibanding chatbot FAQ biasa.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 pt-16 pb-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <div class="col-span-1 lg:col-span-1">
                    <a href="{{ url('/') }}" class="flex items-center gap-2 mb-5">
                        <img src="{{ asset('images/logo-sigala.png') }}" alt="Logo SIGALA" class="w-8 h-8 object-contain brightness-0 invert">
                        <span class="font-extrabold text-2xl tracking-tight text-white">SIGALA</span>
                    </a>
                    <p class="text-sm text-gray-400 leading-relaxed mb-6">
                        Platform digital terintegrasi untuk edukasi mitigasi, pertolongan pertama, konsultasi kesehatan darurat, dan pemantauan risiko bencana di sekitar Anda.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-600 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-pink-600 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-gray-800 flex items-center justify-center text-gray-400 hover:bg-blue-700 hover:text-white transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-4 tracking-wider text-sm">Tautan Cepat</h3>
                    <ul class="space-y-3">
                        <li><a href="#fitur" class="text-gray-400 hover:text-white text-sm transition">Fitur Utama</a></li>
                        <li><a href="#cara-kerja" class="text-gray-400 hover:text-white text-sm transition">Cara Kerja</a></li>
                        <li><a href="#faq" class="text-gray-400 hover:text-white text-sm transition">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Artikel Kesehatan</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-4 tracking-wider text-sm">Bantuan</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Pusat Bantuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white text-sm transition">Hubungi Kami</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-white font-bold mb-4 tracking-wider text-sm">Kontak Darurat</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-gray-400 text-sm">Ambulans: <a href="tel:118" class="text-white hover:underline font-bold">118</a></span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-gray-400 text-sm">BNPB: <a href="tel:117" class="text-white hover:underline font-bold">117</a></span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span class="text-gray-400 text-sm">Polisi: <a href="tel:110" class="text-white hover:underline font-bold">110</a></span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-gray-500">
                    &copy; {{ date('Y') }} SIGALA — Sistem Siaga Bencana. All rights reserved.
                </p>
                <p class="text-sm text-gray-500 flex items-center gap-1">
                    Dibuat dengan <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg> untuk Indonesia
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const splashScreen = document.getElementById('splash-screen');
            const splashLogo = document.getElementById('splash-logo');
            
            const hasSeenSplash = sessionStorage.getItem('hasSeenSplash');
            
            if (hasSeenSplash) {
                splashScreen.style.display = 'none';
            } else {
                sessionStorage.setItem('hasSeenSplash', 'true');
                
                setTimeout(function () {
                    splashScreen.classList.add('splash-exit');
                    
                    setTimeout(() => {
                        splashLogo.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                        splashLogo.style.position = 'fixed';
                        splashLogo.style.top = '22px';
                        splashLogo.style.left = '22px';
                        splashLogo.style.width = '40px';
                        splashLogo.style.height = '40px';
                        splashLogo.style.zIndex = '10000';
                        splashLogo.style.filter = 'none';
                        
                        const rect = splashLogo.getBoundingClientRect();
                        const targetLeft = 22;
                        const targetTop = 22;
                        
                        const translateX = targetLeft - rect.left;
                        const translateY = targetTop - rect.top;
                        const scale = 40 / rect.width;

                        splashLogo.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
                        splashLogo.style.opacity = '0';

                        setTimeout(() => {
                            splashScreen.classList.add('hidden');
                        }, 700);

                    }, 200);

                }, 4000);
            }

            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const iconOpen = document.getElementById('icon-open');
            const iconClose = document.getElementById('icon-close');

            if (btn && menu) {
                btn.addEventListener('click', function () {
                    const isHidden = menu.classList.contains('hidden');
                    menu.classList.toggle('hidden');
                    iconOpen.classList.toggle('hidden', isHidden);
                    iconClose.classList.toggle('hidden', !isHidden);
                });
            }
        });

        function openModal(title, subtitle, body) {
            const modal = document.getElementById('fitur-modal');
            const modalContent = document.getElementById('modal-content');
            const modalTitle = document.getElementById('modal-title');
            const modalSubtitle = document.getElementById('modal-subtitle');
            const modalBody = document.getElementById('modal-body');
            const modalHeader = document.getElementById('modal-header');

            modalTitle.innerText = title;
            modalSubtitle.innerText = subtitle;
            modalBody.innerText = body;

            if(title === 'AI Asisten (Siggy)') {
                modalHeader.className = "bg-gradient-to-r from-blue-700 to-blue-900 p-6 flex items-start justify-between";
            } else {
                modalHeader.className = "bg-blue-600 p-6 flex items-start justify-between";
            }

            modal.classList.remove('modal-hidden');
            modal.classList.add('modal-visible');
            setTimeout(() => {
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }, 10);
        }

        function closeModal() {
            const modal = document.getElementById('fitur-modal');
            const modalContent = document.getElementById('modal-content');
            
            modalContent.classList.remove('scale-100');
            modalContent.classList.add('scale-95');
            
            modal.classList.remove('modal-visible');
            modal.classList.add('modal-hidden');
        }

        function toggleFaq(button) {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('.faq-icon');
            
            if (answer.classList.contains('active')) {
                answer.classList.remove('active');
                icon.classList.remove('active');
            } else {
                document.querySelectorAll('.faq-answer').forEach(el => el.classList.remove('active'));
                document.querySelectorAll('.faq-icon').forEach(el => el.classList.remove('active'));
                
                answer.classList.add('active');
                icon.classList.add('active');
            }
        }
                if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/sw.js')
                    .then(registration => console.log('SW registered:', registration.scope))
                    .catch(error => console.log('SW registration failed:', error));
            });
        }
    </script>
</body>
</html>