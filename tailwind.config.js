const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                'Poppins': ['Poppins', 'sans-serif'],
            },
        },
        borderRadius: {
            'none': '0',
            'sm': '0.150rem',
            DEFAULT: '0.25rem',
            DEFAULT: '4px',
            'md': '0.375rem',
            'lg': '3rem',
            'full': '9999px',
            'large': '12px',
        },
    },

    plugins: [require('flowbite/plugin')],

    darkMode: 'class',
};
