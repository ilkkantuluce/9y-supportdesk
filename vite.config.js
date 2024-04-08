import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import WindiCSS from 'vite-plugin-windicss';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        WindiCSS(),
    ],
});
