<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - SIGALA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased text-gray-900 bg-white font-sans" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <div class="min-h-screen flex w-full">
        
        <div class="w-full lg:w-1/2 flex flex-col justify-center px-6 sm:px-12 lg:px-24 py-12 relative z-10 bg-white">
            
            <div class="max-w-md w-full mx-auto">
                <a href="{{ url('/') }}" class="flex items-center gap-3 mb-10">
                    <img src="{{ asset('images/logo-sigala.png') }}" alt="Logo SIGALA" class="w-10 h-10 object-contain">
                    <span class="font-extrabold text-2xl tracking-tight text-blue-600">SIGALA</span>
                </a>

                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-2">Selamat Datang Kembali</h1>
                <p class="text-gray-500 text-sm mb-8">Masuk ke akun Anda untuk melanjutkan akses layanan siaga bencana.</p>

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-4 rounded-xl border border-green-200">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 text-sm text-red-600 bg-red-50 p-4 rounded-xl border border-red-200">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-700 mb-2">Email / No. HP</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm"
                                placeholder="nama@email.com">
                        </div>
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label for="password" class="block text-sm font-bold text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition">Lupa Password?</a>
                            @endif
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input id="password" type="password" name="password" required
                                class="block w-full pl-11 pr-4 py-3.5 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all shadow-sm"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                        <label for="remember_me" class="ml-2 text-sm font-medium text-gray-600 cursor-pointer">Ingat saya</label>
                    </div>

                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg shadow-blue-200 text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all hover:-translate-y-0.5">
                        Masuk ke Akun
                    </button>
                </form>

                <p class="mt-8 text-center text-sm text-gray-600">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="font-bold text-blue-600 hover:text-blue-800 transition">Daftar Sekarang</a>
                </p>
            </div>
        </div>

        <div class="hidden lg:flex w-1/2 bg-gray-50 relative overflow-hidden items-center justify-center p-12">
            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-900"></div>
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-white/10 rounded-full blur-3xl transform translate-x-1/3 -translate-y-1/3"></div>
            <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-cyan-400/20 rounded-full blur-3xl transform -translate-x-1/3 translate-y-1/3"></div>

            <div class="relative z-10 text-center max-w-md mx-auto">
                <div class="w-32 h-32 mx-auto bg-white/10 backdrop-blur-lg rounded-3xl border border-white/20 shadow-2xl flex items-center justify-center mb-8 transform rotate-3 hover:rotate-0 transition-transform duration-500">
                    <img src="{{ asset('images/logo-sigala.png') }}" alt="Logo SIGALA" class="w-20 h-20 object-contain drop-shadow-lg">
                </div>
                <h2 class="text-3xl font-extrabold text-white mb-4">Bersama, Kita Lebih Siap.</h2>
                <p class="text-blue-100 leading-relaxed text-sm">Akses fitur lengkap siaga bencana, konsultasi medis, dan asisten pintar Si Siggy hanya dalam satu genggaman.</p>
            </div>
        </div>

    </div>

</body>
</html>