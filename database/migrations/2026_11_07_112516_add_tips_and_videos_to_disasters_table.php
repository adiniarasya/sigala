<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('disasters', function (Blueprint $table) {
            $table->text('tips')->nullable();
            $table->text('video_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('disasters', function (Blueprint $table) {
            $table->dropColumn(['tips', 'video_url']);
        });
    }
};