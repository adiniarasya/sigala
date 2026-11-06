<x-app-layout>
    <div class="max-w-4xl mx-auto w-full">
        
        <div class="mb-10 text-center md:text-left">
            <h1 class="text-3xl md:text-4xl font-extrabold text-sigala-dark mb-2 tracking-tight">Tas Siaga Anda</h1>
            <p class="text-gray-500 text-base md:text-lg">Pastikan semua kebutuhan penting sudah tersedia di tas siaga Anda.</p>
        </div>

        <div x-data="tasSiagaApp({{ $userItems->toJson() }})" class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <div class="md:col-span-2 space-y-3">
                <template x-for="(item, index) in daftarBarang" :key="index">
                    <div @click="toggleItem(index)" class="flex items-center p-4 bg-white border rounded-2xl cursor-pointer transition-all duration-200 shadow-sm hover:shadow-md" :class="item.checked ? 'border-teal-200 bg-teal-50/30' : 'border-gray-100 hover:border-gray-200'">
                        
                        <div class="w-6 h-6 rounded-md border-2 flex items-center justify-center mr-4 transition-colors" :class="item.checked ? 'bg-teal-500 border-teal-500' : 'border-gray-300'">
                            <svg x-show="item.checked" class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>

                        <div class="text-2xl mr-3" x-text="item.ikon"></div>
                        
                        <div class="flex-1">
                            <h3 class="text-sm font-bold text-sigala-dark" x-text="item.nama"></h3>
                        </div>
                    </div>
                </template>
            </div>

            <div class="md:col-span-1">
                <div class="bg-white border border-gray-100 rounded-3xl p-6 shadow-lg shadow-blue-100/50 sticky top-24">
                    <h3 class="font-extrabold text-sigala-dark text-lg mb-4">Skor Kesiapan</h3>
                    
                    <div class="flex items-end gap-2 mb-4">
                        <span class="text-5xl font-black text-sigala-blue" x-text="skor"></span>
                        <span class="text-lg font-bold text-gray-400 mb-1">/ 9</span>
                    </div>

                    <div class="w-full bg-gray-100 rounded-full h-3 mb-2">
                        <div class="bg-gradient-to-r from-sigala-blue to-blue-400 h-3 rounded-full transition-all duration-500" :style="`width: ${(skor / 9) * 100}%`"></div>
                    </div>
                    
                    <p class="text-xs font-semibold mb-6" :class="skor >= 7 ? 'text-teal-600' : (skor >= 4 ? 'text-orange-500' : 'text-red-500')" x-text="statusTeks"></p>

                    <button class="w-full py-3.5 bg-sigala-blue hover:bg-blue-700 text-white font-bold rounded-xl shadow-md transition-all text-sm">
                        Simpan Progres
                    </button>
                </div>
            </div>
            
        </div>
    </div>

    <script>
        function tasSiagaApp(initialItems) {
            return {
                skor: initialItems.filter(item => item.is_checked).length,
                daftarBarang: initialItems.map(item => ({
                    id: item.id,
                    nama: item.item_name,
                    checked: !!item.is_checked,
                    ikon: getIcon(item.item_name)
                })),
                get statusTeks() {
                    if (this.skor >= 8) return 'Sangat Siap';
                    if (this.skor >= 5) return 'Cukup Siap';
                    return 'Belum Siap';
                },
                toggleItem(index) {
                    const item = this.daftarBarang[index];
                    item.checked = !item.checked;
                    this.skor = this.daftarBarang.filter(i => i.checked).length;

                    fetch('{{ route('tas-siaga.update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            id: item.id,
                            is_checked: item.checked
                        })
                    });
                }
            }
        }

        function getIcon(name) {
            const icons = {
                'Air Minum': '💧',
                'Makanan Siap Saji': '🥫',
                'Obat-obatan Pribadi': '💊',
                'Kotak P3K': '🧰',
                'Senter & Baterai': '🔦',
                'Power Bank': '🔋',
                'Dokumen Penting': '📄',
                'Pakaian Ganti': '👕',
                'Perlengkapan Kebersihan': '🧼'
            };
            return icons[name] || '📦';
        }
    </script>
</x-app-layout>