<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop old contents table if exists
        Schema::dropIfExists('contents');
        
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->string('image_url');
            $table->integer('year');
            $table->string('make', 50);
            $table->string('model', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
        // Optionally recreate contents table if rolling back
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_url');
            $table->string('type');
            $table->string('genre');
            $table->timestamps();
        });
    }
};