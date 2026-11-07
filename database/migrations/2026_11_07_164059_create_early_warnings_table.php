<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('early_warnings', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('wilayah');
            $table->string('tingkat_bahaya');
            $table->string('sumber');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('early_warnings');
    }
};