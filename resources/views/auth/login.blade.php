<x-guest-layout>
    <div class="w-full max-w-md mx-auto p-6 bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] sm:p-8">
        
        <!-- Logo & Judul -->
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-sigala-light rounded-full flex items-center justify-center mx-auto mb-4">
                <!-- Ikon Perisai (Bisa diganti dengan logomu nanti) -->
                <svg class="w-10 h-10 text-sigala-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <h1 class="text-2xl font-extrabold text-sigala-dark">SIGALA</h1>
            <p class="text-sm text-gray-500 mt-1">Sistem Informasi Siaga dan Layanan Kesehatan Bencana</p>
        </div>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-sigala-dark mb-1">Email / No. HP</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                    class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 transition-colors bg-gray-50 focus:bg-white" 
                    placeholder="Masukkan email kamu">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-sigala-dark mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 transition-colors bg-gray-50 focus:bg-white"
                    placeholder="••••••••">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
            </div>

            <!-- Ingat Saya & Lupa Password -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-sigala-blue shadow-sm focus:ring-sigala-blue" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-sm font-semibold text-sigala-blue hover:underline" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                @endif
            </div>

            <!-- Tombol Masuk -->
            <button type="submit" class="w-full py-3.5 px-4 bg-sigala-blue hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-sigala-blue/30 transition-all transform hover:-translate-y-0.5">
                Masuk
            </button>
        </form>

        <!-- Link ke Daftar -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-500">Belum punya akun? 
                <a href="{{ route('register') }}" class="font-bold text-sigala-blue hover:underline">Daftar sekarang</a>
            </p>
        </div>
    </div>
</x-guest-layout>