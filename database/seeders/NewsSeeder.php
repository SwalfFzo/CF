<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\User;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        // جِب id لمستخدم (الأفضل يكون admin@example.com، وإذا مش موجود ناخذ أول مستخدم)
        $authorId = User::where('email', 'admin@example.com')->value('id')
            ?? User::query()->value('id');

        // ⚠️ إذا ما فيه أي مستخدم بالجدول، نوقف
        if (! $authorId) {
            $this->command->warn('⚠️ لا يوجد مستخدم في جدول users. أنشئ مستخدم أولاً قبل تشغيل NewsSeeder.');
            return;
        }

        $title = 'إطلاق مبادرة التمكين الرقمي';

        $news = News::create([
            'title'        => $title,
            'slug'         => Str::slug($title) . '-' . Str::random(5),
            'excerpt'      => 'مبادرة تهدف إلى تمكين الجهات الأهلية من استخدام التكنولوجيا.',
            'content'      => 'هذا نص تجريبي يوضح تفاصيل المبادرة وكيفية الاستفادة منها.',
            'status'       => 'Published',
            'published_at' => now(),
            'image'        => 'news/fz.jpg',
            'created_by'   => $authorId, // ✅ الآن الحقل موجود
        ]);

        // اربط بالتصنيفات إن وُجدت
        $categoryIds = NewsCategory::query()->pluck('id')->take(2);
        if ($categoryIds->isNotEmpty()) {
            $news->categories()->sync($categoryIds);
        }
    }
}
