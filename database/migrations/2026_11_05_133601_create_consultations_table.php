<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Pasien
            $table->foreignId('nurse_id')->nullable()->constrained('users')->onDelete('set null'); // Perawat yang menangani
            $table->string('keluhan');
            $table->string('status')->default('menunggu'); // menunggu, berlangsung, selesai
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};