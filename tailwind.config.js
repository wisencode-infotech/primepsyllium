import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/auth/**/*.blade.php',
        './resources/views/backend/**/*.blade.php',
        './resources/views/components/**/*.blade.php',
        './resources/views/profile/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['var(--font-sans)', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: 'var(--color-primary)',
                    hover: 'var(--color-primary-hover)',
                    soft: 'var(--color-primary-soft)',
                    border: 'var(--color-primary-border)',
                },
                surface: {
                    DEFAULT: 'var(--color-surface)',
                    elevated: 'var(--color-surface-elevated)',
                    muted: 'var(--color-surface-muted)',
                },
                text: {
                    DEFAULT: 'var(--color-text)',
                    muted: 'var(--color-text-muted)',
                },
                border: 'var(--color-border)',
                focus: 'var(--color-focus)',
                danger: {
                    DEFAULT: 'var(--color-danger)',
                    border: 'var(--color-danger-border)',
                },
                success: 'var(--color-success)',
            },
        },
    },

    plugins: [forms],
};
