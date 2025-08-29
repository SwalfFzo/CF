<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news', function (Blueprint $t) {
            $t->id();
            $t->string('title', 300);
            $t->string('slug')->unique();
            $t->text('summary')->nullable();
            $t->longText('body');
            $t->string('locale', 5)->default('ar');
            $t->enum('status', ['Draft', 'Published'])->default('Draft');
            $t->timestamp('published_at')->nullable();
            $t->string('cover_image_path')->nullable();
            $t->foreignId('created_by')->constrained('users');
            $t->foreignId('updated_by')->nullable()->constrained('users');
            $t->timestamps();
            $t->index(['status', 'locale', 'published_at']);
        });

        // أضف fullText فقط إذا MySQL
        if (DB::getDriverName() === 'mysql') {
            Schema::table('news', function (Blueprint $t) {
                $t->fullText(['title', 'summary', 'body']);
            });
        }
    }
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
