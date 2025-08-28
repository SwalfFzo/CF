<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            RolesAndAdminSeeder::class,   // يضيف الأدوار + الأدمن
            NewsCategorySeeder::class,    // يضيف التصنيفات الأساسية (إعلانات، فعاليات...)
            NewsSeeder::class,            // يضيف خبر تجريبي
        ]);
    }
}
