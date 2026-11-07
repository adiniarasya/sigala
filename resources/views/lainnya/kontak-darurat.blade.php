<x-app-layout>
    <div class="max-w-xl mx-auto w-full">
        <div class="mb-6 flex items-center">
            <a href="{{ route('lainnya.index') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Kontak Darurat</h1>
        </div>

        <div class="space-y-3">
            <a href="tel:112" class="flex items-center p-4 bg-white border border-gray-200 rounded-2xl shadow-sm hover:bg-gray-50 transition">
                <div class="w-10 h-10 bg-red-100 text-red-600 rounded-xl flex items-center justify-center font-bold mr-4">SOS</div>
                <div class="flex-1">
                    <h3 class="font-bold text-sigala-dark text-sm">Layanan Darurat Nasional</h3>
                    <p class="text-xs text-gray-500">112</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
            </a>
            <a href="tel:117" class="flex items-center p-4 bg-white border border-gray-200 rounded-2xl shadow-sm hover:bg-gray-50 transition">
                <div class="w-10 h-10 bg-blue-100 text-sigala-blue rounded-xl flex items-center justify-center font-bold mr-4">🚑</div>
                <div class="flex-1">
                    <h3 class="font-bold text-sigala-dark text-sm">Ambulans</h3>
                    <p class="text-xs text-gray-500">117</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
            </a>
            <a href="tel:115" class="flex items-center p-4 bg-white border border-gray-200 rounded-2xl shadow-sm hover:bg-gray-50 transition">
                <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center font-bold mr-4">🚁</div>
                <div class="flex-1">
                    <h3 class="font-bold text-sigala-dark text-sm">Basarnas</h3>
                    <p class="text-xs text-gray-500">115</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
            </a>
            <a href="tel:0217992325" class="flex items-center p-4 bg-white border border-gray-200 rounded-2xl shadow-sm hover:bg-gray-50 transition">
                <div class="w-10 h-10 bg-red-50 text-red-500 rounded-xl flex items-center justify-center font-bold mr-4">➕</div>
                <div class="flex-1">
                    <h3 class="font-bold text-sigala-dark text-sm">PMI (Palang Merah)</h3>
                    <p class="text-xs text-gray-500">021-7992325</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
            </a>
        </div>
    </div>
</x-app-layout>