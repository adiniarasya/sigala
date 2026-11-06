<x-app-layout>
    <div class="max-w-5xl mx-auto w-full">
        
        <div class="mb-6 md:mb-8 flex flex-col md:flex-row md:justify-between md:items-end gap-4">
            <div>
                <h1 class="text-2xl font-extrabold text-sigala-dark mb-1">Kelola Pengguna</h1>
                <p class="text-gray-500 text-sm">Manajemen akun pengguna dan perawat di sistem SIGALA.</p>
            </div>
            <button class="px-5 py-2.5 bg-sigala-blue hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow-md transition-colors flex items-center justify-center w-full md:w-auto">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Tambah Pengguna
            </button>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl shadow-sm overflow-hidden">
            
            <!-- TAMPILAN TABEL (Laptop) -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100 text-xs font-bold text-gray-500 uppercase tracking-wider">
                            <th class="p-5">Nama & Email</th>
                            <th class="p-5">Role</th>
                            <th class="p-5">Tanggal Daftar</th>
                            <th class="p-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50/50 transition-colors">
                            <td class="p-5">
                                <p class="font-bold text-sm text-sigala-dark">{{ $user->name }}</p>
                                <p class="text-xs text-gray-500">{{ $user->email }}</p>
                            </td>
                            <td class="p-5">
                                <span class="text-[10px] font-bold px-3 py-1.5 rounded-lg uppercase tracking-wide
                                    {{ $user->role === 'admin' ? 'bg-purple-50 text-purple-600' : '' }}
                                    {{ $user->role === 'perawat' ? 'bg-teal-50 text-teal-600' : '' }}
                                    {{ $user->role === 'pengguna' ? 'bg-blue-50 text-sigala-blue' : '' }}
                                ">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="p-5 text-sm text-gray-500">{{ $user->created_at->format('d M Y') }}</td>
                            <td class="p-5 text-right">
                                <button class="p-2 text-gray-400 hover:text-sigala-blue transition-colors bg-gray-50 rounded-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- TAMPILAN KARTU (HP) -->
            <div class="md:hidden divide-y divide-gray-100">
                @foreach($users as $user)
                <div class="p-5">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-50 text-sigala-blue rounded-full flex items-center justify-center font-bold mr-3">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="font-bold text-sm text-sigala-dark">{{ $user->name }}</h3>
                                <p class="text-xs text-gray-500">{{ $user->email }}</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wide
                            {{ $user->role === 'admin' ? 'bg-purple-50 text-purple-600' : '' }}
                            {{ $user->role === 'perawat' ? 'bg-teal-50 text-teal-600' : '' }}
                            {{ $user->role === 'pengguna' ? 'bg-blue-50 text-sigala-blue' : '' }}
                        ">
                            {{ $user->role }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-50">
                        <p class="text-xs text-gray-400">Daftar: {{ $user->created_at->format('d M Y') }}</p>
                        <button class="text-xs font-bold text-sigala-blue hover:underline">Edit</button>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>