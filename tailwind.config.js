const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'main': '#111927',
                'nav': '#141d2b',
                'primary': '#9fef00',
                'secondary': '#bbff34',
                'card': '#1a2332',
                'card-gray': '#a4b1cd',
                'card-border': '#202837',
                'button-gray': '#263143',
                'button-border-secondary': '#a4b1cd'
            }
        },
    },

    darkMode: 'class',

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
};
