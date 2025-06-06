import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
<<<<<<< HEAD
import tailwindcss from '@tailwindcss/vite';
=======

>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
<<<<<<< HEAD
        tailwindcss(),
=======
>>>>>>> b23218f9b63ae295fb0ca6d842805c2ae63b6d83
    ],
});
