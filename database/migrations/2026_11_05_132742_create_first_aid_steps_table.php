<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('first_aid_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('first_aid_topic_id')->constrained()->onDelete('cascade');
            $table->integer('urutan');
            $table->text('instruksi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('first_aid_steps');
    }
};