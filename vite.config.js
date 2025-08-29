import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            'resources/css/app.css',
            'resources/js/app.js',
            // إدخالات لوحة التحكم:
            'resources/js/admin.js',
            'resources/css/admin.css', // إن وجد
            refresh: true,
        }),
    ],
    server: {
        host: true,     // 0.0.0.0
        port: 5173,
        hmr: {
            host: 'localhost',
            port: 5173,
            protocol: 'ws',
        },
        watch: {
            usePolling: true,
        },
    },
})
