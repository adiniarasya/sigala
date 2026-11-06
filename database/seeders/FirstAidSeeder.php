<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FirstAidTopic;
use App\Models\FirstAidStep;

class FirstAidSeeder extends Seeder
{
    public function run(): void
    {
        $topics = [
            [
                'nama' => 'Luka',
                'slug' => 'luka',
                'ikon' => '🩹',
                'warna' => 'red',
                'steps' => [
                    'Bersihkan tangan terlebih dahulu dengan sabun dan air mengalir.',
                    'Hentikan pendarahan jika masih ada dengan menekan luka menggunakan kain bersih atau perban.',
                    'Cuci luka dengan air bersih atau cairan antiseptik.',
                    'Tutup luka dengan perban steril dan pastikan tidak terlalu kencang.',
                    'Jika luka dalam, lebar, atau tidak berhenti berdarah, segera cari pertolongan medis.',
                ]
            ],
            [
                'nama' => 'Pendarahan',
                'slug' => 'pendarahan',
                'ikon' => '🩸',
                'warna' => 'rose',
                'steps' => [
                    'Segera tekan bagian yang berdarah dengan kain bersih atau perban.',
                    'Jika darah tidak berhenti, naikkan area yang terluka (jika memungkinkan).',
                    'Jangan melepas perban yang sudah menempel dengan luka.',
                    'Jika pendarahan tidak berhenti dalam 10-15 menit, segera cari bantuan medis.',
                ]
            ],
            [
                'nama' => 'Luka Bakar',
                'slug' => 'luka-bakar',
                'ikon' => '🔥',
                'warna' => 'orange',
                'steps' => [
                    'Jauhkan sumber panas atau hentikan kontak dengan penyebab luka bakar.',
                    'Dinginkan area yang terbakar dengan air mengalir selama 10-20 menit.',
                    'Jangan mengoleskan mentega, pasta gigi atau bahan lain yang tidak dianjurkan.',
                    'Tutup luka dengan kain bersih dan steril.',
                    'Jika luka bakar cukup luas, dalam atau mengenai wajah, tangan, kaki atau area sensitif, segera cari pertolongan medis.',
                ]
            ],
            [
                'nama' => 'Pingsan',
                'slug' => 'pingsan',
                'ikon' => '😵',
                'warna' => 'blue',
                'steps' => [
                    'Pastikan lingkungan aman untuk Anda dan korban.',
                    'Periksa kesadaran dengan memanggil dan menggoyang bahu secara perlahan.',
                    'Jika tidak sadar, baringkan korban dengan posisi miring (recovery position).',
                    'Longgarkan pakaian yang ketat.',
                    'Jika tidak sadar lebih dari 5 menit, kejang atau sulit bernapas, segera hubungi layanan darurat (119).',
                ]
            ],
            [
                'nama' => 'Cedera',
                'slug' => 'cedera',
                'ikon' => '🤕',
                'warna' => 'pink',
                'steps' => [
                    'Hentikan aktivitas dan istirahatkan bagian yang cedera.',
                    'Berikan kompres dingin (es) selama 15-20 menit untuk mengurangi bengkak.',
                    'Jika ada luka terbuka, bersihkan dan tutup dengan perban steril.',
                    'Gunakan penyangga atau balutan jika perlu.',
                    'Jika nyeri tidak berkurang, ada deformitas atau tidak bisa digerakkan, segera periksa ke fasilitas kesehatan.',
                ]
            ],
            [
                'nama' => 'Dehidrasi',
                'slug' => 'dehidrasi',
                'ikon' => '💧',
                'warna' => 'cyan',
                'steps' => [
                    'Berikan cairan yang cukup, terutama air putih atau oralit.',
                    'Istirahatkan tubuh dan hindari aktivitas berat.',
                    'Jika gejala tidak membaik atau semakin parah, segera cari pertolongan medis.',
                    'Pada anak-anak, lansia, dan penderita penyakit tertentu, dehidrasi dapat terjadi lebih cepat dan berbahaya.',
                ]
            ],
            [
                'nama' => 'Kondisi Kegawatdaruratan',
                'slug' => 'kondisi-kegawatdaruratan',
                'ikon' => '🚨',
                'warna' => 'red',
                'steps' => [
                    'Segera hubungi layanan darurat (112 atau 119).',
                    'Jangan memindahkan korban jika diduga ada cedera leher atau tulang belakang, kecuali ada bahaya langsung.',
                    'Lakukan resusitasi jantung paru (RJP) jika korban tidak bernapas dan tidak ada denyut nadi, jika Anda terlatih.',
                    'Tetap tenang dan tunggu bantuan medis datang.',
                ]
            ],
        ];

        foreach ($topics as $data) {
            $topic = FirstAidTopic::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'nama' => $data['nama'],
                    'ikon' => $data['ikon'],
                    'warna' => $data['warna'],
                ]
            );

            foreach ($data['steps'] as $index => $step) {
                FirstAidStep::updateOrCreate(
                    [
                        'first_aid_topic_id' => $topic->id,
                        'urutan' => $index + 1,
                    ],
                    [
                        'instruksi' => $step,
                    ]
                );
            }
        }
    }
}