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
    const categoryLabels = Object.fromEntries((config.tabs || []).map(tab => [tab.id, tab.label]));
    const huskGradeTable = {
        title: 'Grade-wise Technical Quality Specification',
        subtitle: 'USP Monographs: Plantago Husk, 2007',
        columns: ['Property', '99%', '98%', '95%', '90%', '85%', '80%', '70%'],
        rows: [
            ['Purity', 'NLT 99%', 'NLT 98%', 'NLT 95%', 'NLT 90%', 'NLT 85%', 'NLT 80%', 'NLT 70%'],
            ['Swell Volume', 'NLT 60 ml/gm', 'NLT 55 ml/gm', 'NLT 50 ml/gm', 'NLT 60 ml/gm', 'NLT 40 ml/gm', 'NLT 25 ml/gm', 'NLT 22 ml/gm'],
            ['Color', 'White to light grey, translucent', 'White to light grey, translucent', 'White to light grey, translucent', 'White to light grey, translucent', 'White to light grey, translucent', 'White to light grey, translucent', 'White to light grey, translucent'],
            ['Odor', 'Faint, characteristic', 'Faint, characteristic', 'Faint, characteristic', 'Faint, characteristic', 'Faint, characteristic', 'Faint, characteristic', 'Faint, characteristic'],
            ['Taste', 'Bland, mucilaginous', 'Bland, mucilaginous', 'Bland, mucilaginous', 'Bland, mucilaginous', 'Bland, mucilaginous', 'Bland, mucilaginous', 'Bland, mucilaginous'],
            ['Particle Size', '30-100 mesh', '30-100 mesh', '30-100 mesh', '30-100 mesh', '30-100 mesh', '30-100 mesh', '30-100 mesh'],
            ['Moisture (loss on drying)', 'NMT 12.0%', 'NMT 12.0%', 'NMT 12.0%', 'NMT 12.0%', 'NMT 12.0%', 'NMT 12.0%', 'NMT 12.0%'],
            ['Total Ash', 'NMT 4.0%', 'NMT 4.0%', 'NMT 4.0%', 'NMT 4.0%', 'NMT 4.0%', 'NMT 4.0%', 'NMT 4.0%'],
            ['Acid Insoluble Ash', 'NMT 1.0%', 'NMT 1.0%', 'NMT 1.0%', 'NMT 1.0%', 'NMT 1.0%', 'NMT 1.0%', 'NMT 1.0%'],
            ['Foreign Organic Matter', 'NMT 0.5%', 'NMT 0.5%', 'NMT 1.0%', 'NMT 1.0%', 'NMT 1.0%', 'NMT 1.0%', 'NMT 1.0%'],
            ['Light Extraneous Matter', 'NMT 1.0%', 'NMT 2.0%', 'NMT 5.0%', 'NMT 10.0%', 'NMT 15.0%', 'NMT 20.0%', 'NMT 30.0%'],
            ['Insect Infestation', 'NMT 400 insect fragments including mites and psocides per 25 g', 'NMT 400 insect fragments including mites and psocides per 25 g', 'NMT 400 insect fragments including mites and psocides per 25 g', 'NMT 400 insect fragments including mites and psocides per 25 g', 'NMT 400 insect fragments including mites and psocides per 25 g', 'NMT 400 insect fragments including mites and psocides per 25 g', 'NMT 400 insect fragments including mites and psocides per 25 g'],
            ['Microbiological Limit', 'Molds and yeasts NMT 1,000 cfu/g; E. coli absent; Salmonella absent', 'Molds and yeasts NMT 1,000 cfu/g; E. coli absent; Salmonella absent', 'Molds and yeasts NMT 1,000 cfu/g; E. coli absent; Salmonella absent', 'Molds and yeasts NMT 1,000 cfu/g; E. coli absent; Salmonella absent', 'Molds and yeasts NMT 1,000 cfu/g; E. coli absent; Salmonella absent', 'Molds and yeasts NMT 1,000 cfu/g; E. coli absent; Salmonella absent', 'Molds and yeasts NMT 1,000 cfu/g; E. coli absent; Salmonella absent'],
        ],
        note: 'NMT = Not More Than. NLT = Not Less Than. BP, EP and IP specification support available on request.',
    };
    const seedSpecTable = {
        title: 'Technical Quality Specification',
        subtitle: 'USP Monographs: Plantago Seeds, 2007',
        columns: ['Property', 'Psyllium Seeds', 'Psyllium Seed Powder'],
        rows: [
            ['Color', 'Light brown to moderate brown', 'Light brown to moderate brown'],
            ['Odor', 'Faint, characteristic', 'Faint, characteristic'],
            ['Taste', 'Bland, mucilaginous', 'Bland, mucilaginous'],
            ['Particle Size', 'NMT 5.0%', '20-120 mesh as per buyer requirements'],
            ['Moisture (loss on drying)', 'NMT 12.0%', 'NMT 12.0%'],
            ['Total Ash', 'NMT 4.0%', 'NMT 4.0%'],
            ['Acid Insoluble Ash', 'NMT 1.0%', 'NMT 1.0%'],
            ['Foreign Organic Matter', 'NMT 0.5%', 'NMT 0.5%'],
            ['Light Extraneous Matter', 'NMT 1%', 'NMT 30%'],
            ['Purity', 'NLT 99%', 'NLT 70%'],
        ],
        note: 'NMT = Not More Than. NLT = Not Less Than.',
    };
    const seedPowderSpecTable = {
        ...seedSpecTable,
        rows: [
            ['Color', 'Light brown to moderate brown', 'Light brown to moderate brown'],
            ['Odor', 'Faint, characteristic', 'Faint, characteristic'],
            ['Taste', 'Bland, mucilaginous', 'Bland, mucilaginous'],
            ['Particle Size', 'Maximum 1.0% on U.S.S. 10#', '20-120 mesh as per buyer requirements'],
            ['Moisture (loss on drying)', 'Maximum 12.0%', 'Maximum 12.0%'],
            ['Total Ash', 'Maximum 4.0%', 'Maximum 4.0%'],
            ['Acid Insoluble Ash', 'Maximum 1.0%', 'Maximum 1.0%'],
            ['Foreign Organic Matter', 'Maximum 0.5%', 'Maximum 0.5%'],
            ['Light Extraneous Matter', 'NMT 1%', 'NMT 30%'],
            ['Purity', 'Minimum 99%', 'Minimum 70%'],
        ],
    };
    const khakhaSpecTable = {
        title: 'Technical Quality Specification',
        subtitle: 'Psyllium Kha-Kha Powder',
        columns: ['Property', 'Psyllium Kha-Kha Powder'],
        rows: [
            ['Purity', 'NLT 70%'],
            ['Color', 'Light brown to moderate brown'],
            ['Odor', 'Faint, characteristic'],
            ['Taste', 'Bland, mucilaginous'],
            ['Swelling Volume', '20-40 ml/gm'],
            ['Moisture (loss on drying)', 'NMT 12.0%'],
            ['Total Ash', 'NMT 8.0%'],
            ['Heavy Extraneous Matter', 'NMT 5.0%'],
            ['Light Extraneous Matter', 'NMT 25%'],
        ],
        note: 'NMT = Not More Than. NLT = Not Less Than. BP, EP and IP specification support available on request.',
    };
    const infoTable = (rows, title = 'Product Information') => ({
        title,
        subtitle: 'Product detail summary',
        columns: ['Detail', 'Information'],
        rows,
        note: '',
    });
    const detailBySlug = {
        'psyllium-husk': {
            sourceUrl: 'https://primepsyllium.com/products/psyllium-husk/',
            overview: 'Cleaned and dried outer coat of Plantago ovata seeds, valued as a natural mucilage-rich dietary fiber for food, animal nutrition, pharma and supplement use.',
            details: [
                'Psyllium husk is obtained from the cleaned and dried outer coat of Plantago ovata seeds. After careful processing to remove impurities, it becomes a highly valued natural fiber ingredient with consistent quality and purity.',
                'The husk is the natural mucilage layer surrounding the seed and is widely recognized as a pure dietary fiber. It is used in human and animal foods, pharmaceutical formulations, and fiber supplements.',
                'Multiple purity grades are available, including 99%, 98%, 95%, 90%, 85%, 80%, and 70%, helping different industries source the right grade for their application.',
            ],
            features: ['Natural seed coat fiber', '70% to 99% purity grades', 'Strong swelling capacity', 'USP/BP/EP/IP support'],
            applications: ['Human food products', 'Animal nutrition', 'Pharmaceutical formulations', 'Fiber supplements'],
            specs: ['Purity: NLT 70% to 99%', 'Swell volume: up to NLT 60 ml/gm', 'Particle size: 30-100 mesh', 'Moisture: NMT 12%'],
            specTable: huskGradeTable,
        },
        'psyllium-husk-powder': {
            sourceUrl: 'https://primepsyllium.com/products/psyllium-husk-powder/',
            overview: 'Finely milled husk powder made from cleaned Plantago ovata seed coat, designed for smooth blending, reliable viscosity and controlled fiber performance.',
            details: [
                'Psyllium husk powder is produced from the carefully cleaned and dried outer layer of Plantago ovata seeds. It is known for rich natural fiber content and is widely used as a dietary fiber ingredient across food and wellness applications.',
                'Appreciated for purity and smooth texture, it is suitable for human and animal nutrition, pharmaceutical formulations, and fiber supplements.',
                'Prime Psyllium supplies multiple purity grades such as 99%, 98%, 95%, 90%, 85%, 80%, and 70% with strict quality control for safety, consistency, and dependable performance.',
            ],
            features: ['Fine husk powder profile', '70% to 99% purity grades', 'Consistent viscosity', 'Mucilage-rich soluble fiber'],
            applications: ['Capsules and sachets', 'Beverage mixes', 'Food thickening', 'Nutraceutical powders'],
            specs: ['Purity: NLT 70% to 99%', 'Swell volume: up to NLT 60 ml/gm', 'Particle size: 30-100 mesh', 'Ash: NMT 4%'],
            specTable: huskGradeTable,
        },
        'psyllium-seed': {
            sourceUrl: 'https://primepsyllium.com/products/psyllium-seed/',
            overview: 'Dried ripe Plantago ovata seeds, cleaned of dust, stones and fibers, with a smooth glossy surface and natural mucilage content for global ingredient use.',
            details: [
                'Psyllium seeds are important agri-farm products from the dried ripe seeds of Plantago ovata. They are carefully cleaned to remove dust, stones, fibers, and other impurities.',
                'The Plantago ovata plant grows in India and parts of Iran and is widely cultivated in dry climate regions. Psyllium seeds are small, boat-shaped, light to dark brown, and have a smooth glossy surface on one side with a natural cavity on the other.',
                'With reliable sourcing and thorough processing, these seeds support global food, health, and industrial applications where purity and consistency matter.',
            ],
            features: ['Clean whole seeds', 'Light to dark brown profile', 'Natural mucilage content', 'Purity target NLT 99%'],
            applications: ['Seed blends', 'Agricultural inputs', 'Further processing', 'Specialty formulations'],
            specs: ['Moisture: NMT 12%', 'Total ash: NMT 4%', 'Foreign matter: NMT 0.5%', 'Seed powder: 20-120 mesh'],
            specTable: seedSpecTable,
        },
        'psyllium-seed-powder': {
            sourceUrl: 'https://primepsyllium.com/products/psyllium-seed-powder/',
            overview: 'Finely ground Plantago ovata seed powder, rich in soluble fiber and prepared for health, nutrition and industrial formulations needing steady texture.',
            details: [
                'Psyllium seed powder is a plant-based dietary supplement made by finely grinding the seeds of the Plantago ovata plant. Rich in soluble fiber, it is widely used to support digestion, regulate bowel movements, and promote overall gut wellness.',
                'As a reliable Psyllium Seed Powder supplier and manufacturer in India, Prime Psyllium provides high-quality products processed from carefully selected psyllium seeds.',
                'The product is prepared for health, nutrition, and industrial applications with a focus on purity, consistency, and top-grade processing quality.',
                'Note: Specifications follow USP29. Based on client requirements, products can also be supplied to meet BP, EP, and IP standards.',
            ],
            features: ['Fine seed powder', '20-120 mesh options', 'Plant-based soluble fiber', 'Consistent processing quality'],
            applications: ['Industrial blends', 'Nutritional mixes', 'Powder formulations', 'Custom bulk supply'],
            specs: ['Particle size: 20-120 mesh', 'Purity: minimum 70%', 'Moisture: max 12%', 'Total ash: max 4%'],
            specTable: seedPowderSpecTable,
        },
        'psyllium-khakha-powder': {
            sourceUrl: 'https://primepsyllium.com/products/psyllium-khakha-powder/',
            overview: 'A practical psyllium fiber powder for value-driven nutritional, animal-feed and industrial formulations where dependable bulk functionality matters.',
            details: [
                'Psyllium Khakha Powder is made from the cleaned and dried seed coat of Plantago ovata and is valued for its natural fiber content and practical formulation use.',
                'It is used in human and animal foods, pharmaceutical, wellness, nutritional, and industrial applications where a dependable fiber-rich powder is required.',
                'The product offers a cost-effective grade profile with swelling volume, purity, and extraneous matter limits controlled for bulk supply requirements.',
            ],
            features: ['Fiber-rich powder', 'Cost-effective grade', '20-40 ml/gm swelling range', 'Custom grade potential'],
            applications: ['Meal applications', 'Industrial mixes', 'Nutritional fillers', 'Bulk formulation support'],
            specs: ['Purity: NLT 70%', 'Swelling volume: 20-40 ml/gm', 'Total ash: NMT 8%', 'Moisture: NMT 12%'],
            specTable: khakhaSpecTable,
        },
        'turmeric-powder': {
            sourceUrl: 'https://primepsyllium.com/products/turmeric-powder/',
            overview: 'Bright golden turmeric powder made from cleaned, boiled, dried and finely ground Curcuma longa rhizomes, with warm earthy aroma and natural color.',
            details: [
                'Turmeric powder is obtained from dried rhizomes of Curcuma longa. The rhizomes are carefully cleaned, boiled, dried, and finely ground to produce pure turmeric powder that meets strict quality standards.',
                'The turmeric plant is widely cultivated in India and other tropical regions with warm, humid climates. The powder has a bright golden-yellow color, warm earthy aroma, and slightly pungent, bitter taste.',
                'It is suitable for culinary, health, cosmetic, food, nutraceutical, and industrial markets where vibrant color, purity, and consistent quality are required.',
            ],
            features: ['Curcuma longa rhizome powder', 'Bright golden-yellow color', 'Warm earthy aroma', 'Bulk and private-label ready'],
            applications: ['Spice blends', 'Food products', 'Wellness mixes', 'Cosmetic applications'],
            specs: ['Source: dried turmeric rhizomes', 'Color: golden-yellow', 'Taste: slightly pungent and bitter', 'Processing: cleaned, boiled, dried, ground'],
            specTable: infoTable([
                ['Botanical source', 'Curcuma longa dried rhizomes'],
                ['Processing', 'Cleaned, boiled, dried and finely ground'],
                ['Color', 'Bright golden-yellow'],
                ['Aroma and taste', 'Warm earthy aroma with slightly pungent, bitter taste'],
                ['Suitable for', 'Culinary, health, cosmetic, food, nutraceutical and industrial markets'],
            ]),
        },
        'gum-arabic': {
            sourceUrl: 'https://primepsyllium.com/products/gum-arabic/',
            overview: 'Natural resin collected from Acacia trees, cleaned and graded for excellent solubility, binding, stabilization and emulsifying performance.',
            details: [
                'Gum Arabic is a natural resin obtained from the sap of Acacia senegal and Acacia seyal trees. The gum nodules are carefully collected, cleaned, and graded to remove impurities.',
                'Acacia trees mainly grow in arid regions of Africa and parts of Asia, producing golden to amber-colored gum crystals with a glassy appearance.',
                'Gum Arabic is valued for natural binding, stabilizing, and emulsifying properties, making it useful in food, beverages, pharmaceuticals, nutraceuticals, and industrial formulations.',
            ],
            features: ['Acacia senegal/seyal resin', 'Excellent solubility', 'Binding and stabilizing function', 'Golden to amber crystals'],
            applications: ['Food and beverages', 'Pharmaceuticals', 'Flavor emulsions', 'Industrial formulations'],
            specs: ['Source: Acacia tree sap', 'Form: cleaned graded gum nodules', 'Color: golden to amber', 'Function: binder/stabilizer/emulsifier'],
            specTable: infoTable([
                ['Botanical source', 'Sap of Acacia senegal and Acacia seyal trees'],
                ['Processing', 'Collected, cleaned and graded gum nodules'],
                ['Appearance', 'Golden to amber-colored gum crystals with glassy appearance'],
                ['Functional value', 'Natural binding, stabilizing and emulsifying'],
                ['Suitable for', 'Food, beverages, pharmaceuticals, nutraceuticals and industrial formulations'],
            ]),
        },
        'white-gum-arabic': {
            sourceUrl: 'https://primepsyllium.com/products/white-gum-arabic/',
            overview: 'Selected light-grade Acacia senegal resin with pale cream to off-white appearance, neutral taste and strong binding/emulsifying behavior.',
            details: [
                'White Gum Arabic is a superior natural resin derived from the sap of selected Acacia senegal trees. The gum tears are handpicked, cleaned, and graded to remove bark particles and impurities.',
                'It has a pale cream to off-white crystal appearance with a clean translucent look, high purity, light color, and excellent solubility.',
                'Its neutral taste, strong binding ability, and effective emulsifying properties make it ideal for food, beverages, pharmaceuticals, cosmetics, and specialty industries.',
            ],
            features: ['Selected Acacia senegal resin', 'Light cream/off-white color', 'High purity and solubility', 'Neutral taste profile'],
            applications: ['Food and beverages', 'Pharmaceuticals', 'Cosmetics', 'Specialty industries'],
            specs: ['Form: handpicked gum tears', 'Appearance: clean and translucent', 'Color: pale cream to off-white', 'Function: binding and emulsifying'],
            specTable: infoTable([
                ['Botanical source', 'Selected Acacia senegal tree sap'],
                ['Processing', 'Handpicked, cleaned and graded gum tears'],
                ['Appearance', 'Pale cream to off-white crystals with clean translucent look'],
                ['Functional value', 'Neutral taste, strong binding and effective emulsifying'],
                ['Suitable for', 'Food, beverages, pharmaceuticals, cosmetics and specialty industries'],
            ]),
        },
        'chia-seeds': {
            sourceUrl: 'https://primepsyllium.com/products/chia-seeds/',
            overview: 'Export-quality chia seeds with a naturally strong nutrition profile, suited for food processing, supplements, bakery and retail packs.',
            details: [
                'Chia Seeds are premium export-quality seeds rich in fiber, omega-3 fatty acids, protein, and antioxidants.',
                'They are suitable for food processing, health supplements, bakery applications, and retail packaging where clean-label nutrition and reliable quality are important.',
            ],
            features: ['Rich in fiber', 'Omega-3 fatty acids', 'Protein and antioxidants', 'Export-quality seed'],
            applications: ['Food processing', 'Health supplements', 'Bakery applications', 'Retail packaging'],
            specs: ['Nutrient profile: fiber/omega-3/protein', 'Form: whole chia seeds', 'Quality: export grade', 'Use: food and supplement products'],
            specTable: infoTable([
                ['Product profile', 'Premium export-quality chia seeds'],
                ['Nutritional value', 'Rich in fiber, omega-3 fatty acids, protein and antioxidants'],
                ['Suitable for', 'Food processing, health supplements, bakery and retail packaging'],
                ['Format', 'Whole chia seeds'],
            ]),
        },
        'turmeric-whole': {
            sourceUrl: 'https://primepsyllium.com/products/turmeric-whole-roots/',
            overview: 'Whole dried turmeric roots prepared for spice processors, extraction houses and bulk ingredient programs needing natural color and aroma at source form.',
            details: [
                'Turmeric whole roots are dried Curcuma longa roots supplied in whole form for spice processors, extract manufacturers, and bulk ingredient programs.',
                'They are suitable for grinding, extract processing, whole spice packs, private-label supply, and applications where natural turmeric color and aroma are preferred at source form.',
            ],
            features: ['Whole dried roots', 'Carefully cleaned', 'Natural turmeric color', 'Bulk spice supply'],
            applications: ['Grinding operations', 'Whole spice packs', 'Extract processing', 'Private-label supply'],
            specs: ['Form: whole roots', 'Botanical source: Curcuma longa', 'Use: grinding or extraction', 'Supply: bulk and private label'],
            specTable: infoTable([
                ['Botanical source', 'Curcuma longa whole roots'],
                ['Form', 'Whole dried turmeric roots'],
                ['Use case', 'Grinding, extract processing, whole spice packs and bulk ingredient supply'],
                ['Supply support', 'Bulk and private-label programs'],
            ]),
        },
    };

    function buildProductDetails(product, source = 'primary') {
        const extra = detailBySlug[product.slug] || {};
        const categories = product.categories || (source === 'also' ? ['also-available'] : []);
        return {
            ...product,
            source,
            categoryLabels: categories.map(cat => categoryLabels[cat] || cat.replaceAll('-', ' ')),
            overview: extra.overview || product.description,
            details: extra.details || [product.description],
            features: extra.features || ['Reliable quality', 'Bulk supply ready', 'Custom support', 'Export focused'],
            applications: extra.applications || ['Food products', 'Nutraceuticals', 'Private label', 'Bulk sourcing'],
            specs: extra.specs || ['Custom grades available', 'Bulk packaging support', 'Export documentation ready', 'Quality-controlled supply'],
            specTable: extra.specTable || infoTable([['Quality', 'Controlled supply'], ['Packaging', 'Bulk packaging support'], ['Documentation', 'Export documentation ready']]),
            sourceUrl: extra.sourceUrl || null,
        };
    }

    return {
        activeTab: 'all-products',
        search: '',
        tabs: config.tabs,
        products: config.items,
        alsoProducts: config.also_available || [],
        visibleCount: config.items.length,
        showAlsoAvailable: true,
        showOtherProducts: false,
        drawerOpen: false,
        selectedProduct: null,

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

        openDrawer(product, source = 'primary') {
            this.selectedProduct = buildProductDetails(product, source);
            this.drawerOpen = true;
            document.documentElement.classList.add('overflow-hidden');
        },

        closeDrawer() {
            this.drawerOpen = false;
            document.documentElement.classList.remove('overflow-hidden');
        },
    };
};

Alpine.start();
