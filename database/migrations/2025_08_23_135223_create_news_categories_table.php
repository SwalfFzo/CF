<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news_categories', function (Blueprint $t) {
            $t->id();
            $t->string('name');
            $t->string('slug')->unique();
            $t->timestamps();
        });

        Schema::create('news_category_map', function (Blueprint $t) {
            $t->id();
            $t->foreignId('news_id')->constrained('news')->cascadeOnDelete();
            $t->foreignId('category_id')->constrained('news_categories')->cascadeOnDelete();
            $t->unique(['news_id', 'category_id']);
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('news_category_map');
        Schema::dropIfExists('news_categories');
    }
};
