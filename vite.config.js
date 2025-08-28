import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //'resources/css/app.css',
                //'resources/js/app.js',
                // لو عندك ملفات خاصة بلوحة التحكم
                'resources/css/admin.css',
                'resources/js/admin.js',
            ],
            refresh: true,
        }),
    ],
})