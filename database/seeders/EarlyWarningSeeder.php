<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EarlyWarning;

class EarlyWarningSeeder extends Seeder
{
    public function run(): void
    {
        EarlyWarning::create([
            'judul' => 'Peringatan Dini',
            'deskripsi' => 'Waspada potensi banjir di beberapa wilayah Bekasi.',
            'wilayah' => 'Bekasi',
            'tingkat_bahaya' => 'Waspada',
            'sumber' => 'BMKG',
        ]);

        EarlyWarning::create([
            'judul' => 'Peringatan Dini',
            'deskripsi' => 'Waspada potensi genangan air di beberapa titik di Depok.',
            'wilayah' => 'Depok',
            'tingkat_bahaya' => 'Waspada',
            'sumber' => 'BPBD',
        ]);

        EarlyWarning::create([
            'judul' => 'Peringatan Dini',
            'deskripsi' => 'Waspada potensi angin kencang di wilayah Jakarta Selatan.',
            'wilayah' => 'Jakarta',
            'tingkat_bahaya' => 'Siaga',
            'sumber' => 'BMKG',
        ]);
    }
}   