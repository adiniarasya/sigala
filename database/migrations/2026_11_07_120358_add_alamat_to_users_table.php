<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kita cek dulu, kalau belum ada baru kita buat
            if (!Schema::hasColumn('users', 'whatsapp')) {
                $table->string('whatsapp')->nullable();
            }
            if (!Schema::hasColumn('users', 'usia')) {
                $table->string('usia')->nullable();
            }
            if (!Schema::hasColumn('users', 'gender')) {
                $table->string('gender')->nullable();
            }
            if (!Schema::hasColumn('users', 'alamat')) {
                $table->text('alamat')->nullable();
            }
            if (!Schema::hasColumn('users', 'golongan_darah')) {
                $table->string('golongan_darah')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['whatsapp', 'usia', 'gender', 'alamat', 'golongan_darah']);
        });
    }
};