<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->comment('The admin who wrote the article')->constrained('users');
            $table->string('title');
            $table->string('slug')->unique(); // buat pretty URLs, kayak /articles/my-first-post
            $table->text('content');
            $table->string('image')->nullable(); // Path nya untuk gambar
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
