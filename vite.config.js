import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/frontend/css/app.css',
                'resources/frontend/js/app.js',
                'resources/backend/css/app.css',
                'resources/backend/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
