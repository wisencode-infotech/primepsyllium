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
            { label: 'Products', href: '#products' },
            { label: 'Quality', href: '#quality' },
            { label: 'Sustainability', href: '#sustainability' },
            { label: 'About Us', href: '#about' },
            { label: 'Resources', href: '#resources' },
            { label: 'Contact', href: '#contact' },
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

window.productsSection = function productsSection() {
    const config = window.__productsConfig || { tabs: [], items: [], also_available: [] };

    return {
        activeTab: 'all-products',
        search: '',
        tabs: config.tabs,
        products: config.items,
        visibleCount: config.items.length,
        showAlsoAvailable: true,
        showOtherProducts: false,

        init() {
            this.$watch('activeTab', () => this._recount());
            this.$watch('search',    () => this._recount());
        },

        _recount() {
            this.visibleCount      = this.products.filter(p => this._check(p)).length;
            this.showAlsoAvailable = this.activeTab === 'all-products' && !this.search.trim();
            if (!this.showAlsoAvailable) this.showOtherProducts = false;
        },

        _check(product) {
            const matchesTab = this.activeTab === 'all-products' ||
                               product.categories.includes(this.activeTab);
            const q = this.search.trim().toLowerCase();
            const matchesSearch = !q ||
                product.name.toLowerCase().includes(q) ||
                product.description.toLowerCase().includes(q);
            return matchesTab && matchesSearch;
        },

        // Called from x-show="isVisible($el.dataset.pid)"
        isVisible(pid) {
            const product = this.products.find(p => String(p.id) === String(pid));
            return product ? this._check(product) : false;
        },
    };
};

Alpine.start();
