import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/companyprofile.css', // Ganti dengan file CSS baru
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});