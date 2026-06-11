import './bootstrap';
import { initializeTheme, setTheme } from '../../shared/js/theme';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.siteShell = function siteShell() {
    return {
        scrolled: false,
        menuOpen: false,
        theme: 'light',
        menuItems: [
            { label: 'Psyllium Products', href: '#' },
            { label: 'Other Ingredients', href: '#' },
            { label: 'About us', href: '#' },
            { label: 'Applications', href: '#' },
            { label: 'Contact', href: '#' },
        ],
        init() {
            initializeTheme();
            this.theme = document.documentElement.dataset.theme || 'light';
            this.scrolled = window.scrollY > 20;
        },
        onScroll() {
            this.scrolled = window.scrollY > 20;
        },
        toggleTheme() {
            this.theme = this.theme === 'dark' ? 'light' : 'dark';
            setTheme(this.theme);
        },
    };
};

Alpine.start();
