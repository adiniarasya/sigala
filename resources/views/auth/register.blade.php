<x-guest-layout>
    <div class="w-full max-w-md mx-auto p-6 bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] sm:p-8">
        
        <div class="text-center mb-6">
            <h1 class="text-2xl font-extrabold text-sigala-dark">Daftar Akun SIGALA</h1>
            <p class="text-sm text-gray-500 mt-1">Buat akun untuk mengakses semua fitur</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf

            <!-- Nama -->
            <div>
                <label for="name" class="block text-sm font-semibold text-sigala-dark mb-1">Nama Lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                    class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 focus:bg-white transition-colors" 
                    placeholder="Masukkan nama lengkap">
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-xs" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-sigala-dark mb-1">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                    class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 focus:bg-white transition-colors" 
                    placeholder="Masukkan email aktif">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-sigala-dark mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 focus:bg-white transition-colors"
                    placeholder="Minimal 8 karakter">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-sigala-dark mb-1">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 focus:bg-white transition-colors"
                    placeholder="Ulangi password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-xs" />
            </div>

            <div class="mt-4">
                <label for="role" class="block text-sm font-semibold text-sigala-dark mb-1">Daftar Sebagai</label>
                <select id="role" name="role" class="w-full px-4 py-3 rounded-xl border-gray-200 focus:border-sigala-blue focus:ring focus:ring-sigala-blue/20 bg-gray-50 focus:bg-white transition-colors" required>
                    <option value="pengguna" {{ old('role') == 'pengguna' ? 'selected' : '' }}>Masyarakat (Pengguna)</option>
                    <option value="perawat" {{ old('role') == 'perawat' ? 'selected' : '' }}>Tenaga Kesehatan (Perawat)</option>
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2 text-red-500 text-xs" />
            </div>

            <button type="submit" class="w-full py-3.5 px-4 bg-sigala-blue hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-sigala-blue/30 transition-all transform hover:-translate-y-0.5 mt-2">
                Daftar Akun
            </button>
        </form>

        <div class="mt-6 text-center">
            <p class="text-sm text-gray-500">Sudah punya akun? 
                <a href="{{ route('login') }}" class="font-bold text-sigala-blue hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</x-guest-layout>