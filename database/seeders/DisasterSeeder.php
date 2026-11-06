<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Disaster;

class DisasterSeeder extends Seeder
{
    public function run(): void
    {
        $disasters = [
            ['nama' => 'Gempa Bumi', 'slug' => 'gempa-bumi', 'ikon' => '⚡', 'warna' => 'orange'],
            ['nama' => 'Banjir', 'slug' => 'banjir', 'ikon' => '🌊', 'warna' => 'blue'],
            ['nama' => 'Tsunami', 'slug' => 'tsunami', 'ikon' => '🌀', 'warna' => 'cyan'],
            ['nama' => 'Tanah Longsor', 'slug' => 'tanah-longsor', 'ikon' => '⛰️', 'warna' => 'amber'],
        ];

        foreach ($disasters as $disaster) {
            Disaster::create($disaster);
        }
    }
}