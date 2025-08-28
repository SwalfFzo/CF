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
        Schema::create('ms_tokens', function (Blueprint $t) {
            $t->id();
            $t->string('account')->index(); // البريد أو معرف المستخدم
            $t->text('access_token');       // نشفّره بالتخزين
            $t->text('refresh_token');      // مهم للاستخدام الدائم
            $t->integer('expires_in');      // بالثواني
            $t->timestamp('obtained_at');   // وقت الحصول على التوكن
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ms_tokens');
    }
};
