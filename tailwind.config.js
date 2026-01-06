import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
              'brand-green-light': '#1dd77c',
              'brand-green': '#25c50c',
              'brand-blue': '#0e55f9',
              'brand-blue-dark': '#104087',
              'brand-navy': '#0F172A', // لون الخلفية الكحلي
            },
        },
    },

    plugins: [forms],
};
