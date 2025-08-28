<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // يحميك لو كان الجدول موجود لأي سبب
        Schema::dropIfExists('news_category_map');

        Schema::create('news_category_map', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained('news')->cascadeOnDelete();
            $table->foreignId('news_category_id')->constrained('news_categories')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['news_id', 'news_category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_category_map');
    }
};
