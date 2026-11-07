<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disaster;

class DisasterSeeder extends Seeder
{
    public function run(): void
    {
        $disasters = [
            [
                'nama' => 'Gempa Bumi',
                'slug' => 'gempa-bumi',
                'ikon' => '⚡',
                'warna' => 'orange',
                'tips' => '1. Istirahat yang cukup dan hindari pekerjaan berat. 2. Segera berlindung di bawah meja atau benda yang kuat. 3. Jauhi kaca, lemari, dan benda yang bisa jatuh. 4. Jika berada di luar, menjauhlah dari bangunan, tiang listrik, dan pohon. 5. Setelah guncangan berhenti, periksa kondisi diri dan sekitar.',
                'video_url' => json_encode([
                    [
                        'url' => 'https://www.youtube.com/embed/1nXkJq5OZl0',
                        'judul' => 'Apa sih Gempa Bumi itu? - Info BMKG'
                    ],
                    [
                        'url' => 'https://www.youtube.com/embed/YXpIW3GoGco',
                        'judul' => 'Mitigasi Menghadapi Gempa Bumi'
                    ]
                ]),
            ],
            [
                'nama' => 'Banjir',
                'slug' => 'banjir',
                'ikon' => '🌊',
                'warna' => 'blue',
                'tips' => '1. Matikan aliran listrik dan gas. 2. Simpan dokumen penting di tempat yang tinggi. 3. Jangan berjalan di air yang mengalir deras. 4. Ikuti arahan petugas evakuasi.',
                'video_url' => json_encode([
                    [
                        'url' => 'https://www.youtube.com/embed/b5wjvTA4ao4',
                        'judul' => 'Edukasi Kesiapsiagaan Banjir'
                    ]
                ]),
            ],
            [
                'nama' => 'Tsunami',
                'slug' => 'tsunami',
                'ikon' => '🌀',
                'warna' => 'cyan',
                'tips' => '1. Segera menuju tempat yang lebih tinggi. 2. Jauhi pantai dan sungai. 3. Ikuti jalur evakuasi yang telah ditentukan. 4. Jangan kembali ke pantai sampai dinyatakan aman.',
                'video_url' => json_encode([
                    [
                        'url' => 'https://www.youtube.com/embed/6qWWysS53E4',
                        'judul' => 'Mitigasi Menghadapi Tsunami - Info BMKG'
                    ],
                    [
                        'url' => 'https://www.youtube.com/embed/YXpIW3GoGco',
                        'judul' => 'Mengenali Tanda-tanda Tsunami'
                    ]
                ]),
            ],
            [
                'nama' => 'Tanah Longsor',
                'slug' => 'tanah-longsor',
                'ikon' => '⛰️',
                'warna' => 'amber',
                'tips' => '1. Waspadai suara gemuruh dan retakan tanah. 2. Segera evakuasi ke area yang lebih stabil. 3. Jauhi lereng dan tebing. 4. Hubungi pihak berwenang.',
                'video_url' => json_encode([
                    [
                        'url' => 'https://www.youtube.com/embed/YT7I1-33dGQ',
                        'judul' => 'Edukasi Mitigasi Tanah Longsor'
                    ]
                ]),
            ],
        ];

        foreach ($disasters as $disaster) {
            Disaster::updateOrCreate(['slug' => $disaster['slug']], $disaster);
        }
    }
}