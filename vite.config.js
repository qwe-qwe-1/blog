import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import fs from 'fs';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        cors: false,
        allowedHosts: [".blog.app"],
        host: true,
        hmr: {
            host: 'blog.app',
        },
        https: {
            key: fs.readFileSync(`/etc/ssl/key.key`), 
            cert: fs.readFileSync(`/etc/ssl/cert.crt`), 
        },
        headers: {
            'Access-Control-Allow-Origin': '*',
        },
    },
});