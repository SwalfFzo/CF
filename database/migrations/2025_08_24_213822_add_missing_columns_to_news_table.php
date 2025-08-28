<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_missing_columns_to_news_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            // أضف فقط إن كانت غير موجودة (SQLite لا يدعم IF NOT EXISTS للعمود، فافحص قبلها لو تحب)
            if (!Schema::hasColumn('news', 'excerpt'))      $table->text('excerpt')->nullable()->after('title');
            if (!Schema::hasColumn('news', 'content'))      $table->longText('content')->nullable()->after('excerpt');
            if (!Schema::hasColumn('news', 'image'))        $table->string('image')->nullable()->after('content');
            if (!Schema::hasColumn('news', 'status'))       $table->string('status', 20)->default('Draft')->after('image');
            if (!Schema::hasColumn('news', 'published_at')) $table->timestamp('published_at')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            if (Schema::hasColumn('news', 'published_at')) $table->dropColumn('published_at');
            if (Schema::hasColumn('news', 'status'))       $table->dropColumn('status');
            if (Schema::hasColumn('news', 'image'))        $table->dropColumn('image');
            if (Schema::hasColumn('news', 'content'))      $table->dropColumn('content');
            if (Schema::hasColumn('news', 'excerpt'))      $table->dropColumn('excerpt');
        });
    }
};
