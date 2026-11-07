<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tinggi')->nullable();
            $table->string('berat')->nullable();
            $table->string('riwayat_penyakit')->nullable();
            $table->string('alergi')->nullable();
            $table->string('obat_rutin')->nullable();
            $table->string('kelompok_risiko')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['tinggi', 'berat', 'riwayat_penyakit', 'alergi', 'obat_rutin', 'kelompok_risiko']);
        });
    }
};