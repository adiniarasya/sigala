<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - SIGALA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900 bg-white font-sans" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="min-h-screen flex w-full">
        
        <div class="hidden lg:flex w-1/2 bg-gray-50 relative overflow-hidden items-center justify-center p-12">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-900"></div>
            <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-white/10 rounded-full blur-3xl transform -translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-cyan-400/20 rounded-full blur-3xl transform translate-x-1/3 translate-y-1/3"></div>

            <div class="relative z-10 text-center max-w-md mx-auto">
                <div class="w-32 h-32 mx-auto bg-white/10 backdrop-blur-lg rounded-3xl border border-white/20 shadow-2xl flex items-center justify-center mb-8 transform -rotate-3 hover:rotate-0 transition-transform duration-500">
                    <img src="{{ asset('images/logo-sigala.png') }}" alt="Logo SIGALA" class="w-20 h-20 object-contain drop-shadow-lg">
                </div>
                <h2 class="text-3xl font-extrabold text-white mb-4">Mulai Langkah Kecil Anda.</h2>
                <p class="text-blue-100 leading-relaxed text-sm">Daftarkan diri Anda sekarang dan dapatkan akses ke seluruh fitur mitigasi dan layanan kesehatan darurat SIGALA.</p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 sm:px-12 lg:px-24 py-12 relative z-10 bg-white">
            
            <div class="max-w-md w-full mx-auto">
                <a href="{{ url('/') }}" class="flex items-center gap-3 mb-10">
                    <img src="{{ asset('images/logo-sigala.png') }}" alt="Logo SIGALA" class="w-10 h-10 object-contain">
                    <span class="font-extrabold text-2xl tracking-tight text-blue-600">SIGALA</span>
                </a>

                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-2">Daftar Akun Baru</h1>
                <p class="text-gray-500 text-sm mb-8">Lengkapi data diri Anda untuk mulai menggunakan layanan.</p>

                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600 bg-red-50 p-4 rounded-xl border border-red-200">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-1.5">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                            class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm"
                            placeholder="Sesuai KTP">
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-bold text-gray-700 mb-1.5">Daftar Sebagai</label>
                        <select id="role" name="role" class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm appearance-none cursor-pointer">
                            <option value="masyarakat">Masyarakat (Pengguna)</option>
                            <option value="perawat">Perawat / Tenaga Medis</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="email" class="block text-sm font-bold text-gray-700 mb-1.5">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required
                                class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm"
                                placeholder="nama@email.com">
                        </div>
                        <div>
                            <label for="whatsapp" class="block text-sm font-bold text-gray-700 mb-1.5">No. WhatsApp</label>
                            <input id="whatsapp" type="text" name="whatsapp" value="{{ old('whatsapp') }}" required
                                class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm"
                                placeholder="08xxxxxxxxxx">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="password" class="block text-sm font-bold text-gray-700 mb-1.5">Password</label>
                            <input id="password" type="password" name="password" required
                                class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm"
                                placeholder="Minimal 8 karakter">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-1.5">Ulangi Password</label>
                            <input id="password_confirmation" type="password" name="password_confirmation" required
                                class="block w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm"
                                placeholder="Ulangi password">
                        </div>
                    </div>

                    <button type="submit" class="w-full mt-2 flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-blue-200 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all hover:-translate-y-0.5">
                        Daftar Sekarang
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-gray-600">
                    Sudah punya akun? 
                    <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-800 transition">Masuk di sini</a>
                </p>
            </div>
        </div>

    </div>

</body>
</html>