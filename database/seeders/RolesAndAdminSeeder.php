<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        // الأدوار الأساسية
        $roles = ['admin', 'event_manager', 'content_editor', 'trainer', 'trainee'];
        foreach ($roles as $r) {
            Role::findOrCreate($r, 'web');
        }

        // 🟢 أدمن
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Admin@123'),
            ]
        );
        $admin->syncRoles(['admin', 'event_manager', 'content_editor']);

        // 🟢 متدرب
        $trainee = User::firstOrCreate(
            ['email' => 'trainee@example.com'],
            [
                'name' => 'Test Trainee',
                'password' => Hash::make('123@123'),
            ]
        );
        $trainee->syncRoles(['trainee']);

        // 🟢 مدرب
        $trainer = User::firstOrCreate(
            ['email' => 'trainer@example.com'],
            [
                'name' => 'Test Trainer',
                'password' => Hash::make('123@123'),
            ]
        );
        $trainer->syncRoles(['trainer']);
    }
}
