<x-app-layout>
    <div class="max-w-2xl mx-auto w-full">
        
        <div class="mb-6 flex items-center">
            <a href="{{ route('profil') }}" class="text-gray-500 mr-4 bg-white p-2.5 rounded-xl border border-gray-200 hover:bg-gray-50 transition shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-xl font-bold text-sigala-dark">Bantuan & FAQ</h1>
        </div>

        <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-sm text-center mb-6">
            <div class="w-20 h-20 bg-blue-50 text-sigala-blue rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <h2 class="text-xl font-extrabold text-sigala-dark mb-2">Butuh Bantuan?</h2>
            <p class="text-sm text-gray-500">Kami siap membantu Anda. Silakan hubungi kami melalui informasi di bawah ini.</p>
        </div>

        <div class="space-y-4">
            <a href="#" class="flex items-center p-4 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-50 text-sigala-blue rounded-full flex items-center justify-center mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-sigala-dark">Live Chat</h3>
                    <p class="text-xs text-gray-500">Tanya langsung ke tim kami</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="mailto:support@sigala.id" class="flex items-center p-4 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-50 text-sigala-blue rounded-full flex items-center justify-center mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-sigala-dark">Email</h3>
                    <p class="text-xs text-gray-500">support@sigala.id</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>

            <a href="tel:119" class="flex items-center p-4 bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-50 text-sigala-blue rounded-full flex items-center justify-center mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-sigala-dark">Telepon Darurat</h3>
                    <p class="text-xs text-gray-500">119 (Layanan Darurat Nasional)</p>
                </div>
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
    </div>
</x-app-layout>