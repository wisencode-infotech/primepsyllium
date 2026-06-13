<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Product Filter Tabs
    |--------------------------------------------------------------------------
    */
    'tabs' => [
        ['id' => 'all-products', 'label' => 'All Products'],
        ['id' => 'psyllium-husk', 'label' => 'Psyllium Husk'],
        ['id' => 'powders',       'label' => 'Powders'],
        ['id' => 'granules',      'label' => 'Granules'],
        ['id' => 'fibers',        'label' => 'Fibers'],
        ['id' => 'meal',          'label' => 'Meal'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Products
    | categories: must match tab ids above for filtering to work
    |--------------------------------------------------------------------------
    */
    'items' => [
        [
            'id'          => 1,
            'name'        => 'Psyllium Husk',
            'slug'        => 'psyllium-husk',
            'description' => 'Premium quality whole husk for diverse industries',
            'categories'  => ['psyllium-husk', 'fibers'],
            'image'       => 'assets/frontend/images/products/psyllium-husk.png',
        ],
        [
            'id'          => 2,
            'name'        => 'Psyllium Husk Powder',
            'slug'        => 'psyllium-husk-powder',
            'description' => 'Fine powder for versatile pharmaceutical & food applications',
            'categories'  => ['psyllium-husk', 'powders'],
            'image'       => 'assets/frontend/images/products/psyllium-husk-powder.png',
        ],
        [
            'id'          => 3,
            'name'        => 'Psyllium Seed',
            'slug'        => 'psyllium-seed',
            'description' => 'Pure whole seeds with high mucilage content',
            'categories'  => ['granules'],
            'image'       => 'assets/frontend/images/products/psyllium-seed.png',
        ],
        [
            'id'          => 4,
            'name'        => 'Psyllium Seed Powder',
            'slug'        => 'psyllium-seed-powder',
            'description' => 'Finely milled seed powder for industrial use',
            'categories'  => ['powders'],
            'image'       => 'assets/frontend/images/products/psyllium-seed-powder.png',
        ],
        [
            'id'          => 5,
            'name'        => 'Psyllium Khakha Powder',
            'slug'        => 'psyllium-khakha-powder',
            'description' => 'By-product powder with unique nutritional profile',
            'categories'  => ['powders', 'meal'],
            'image'       => 'assets/frontend/images/products/psyllium-khakha-powder.png',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Also Available (secondary products shown in teaser card)
    |--------------------------------------------------------------------------
    */
    'also_available' => [
        [
            'name'        => 'Turmeric Powder',
            'slug'        => 'turmeric-powder',
            'description' => 'Vibrant, high-curcumin turmeric powder for food & pharma',
            'image'       => 'assets/frontend/images/products/turmeric-powder.png',
        ],
        [
            'name'        => 'Gum Arabic',
            'slug'        => 'gum-arabic',
            'description' => 'Natural emulsifier and stabiliser for food and beverage',
            'image'       => 'assets/frontend/images/products/gum-arabic.png',
        ],
        [
            'name'        => 'White Gum Arabic',
            'slug'        => 'white-gum-arabic',
            'description' => 'Refined, light-grade gum arabic for sensitive applications',
            'image'       => 'assets/frontend/images/products/white-gum-arabic.png',
        ],
        [
            'name'        => 'Chia Seeds',
            'slug'        => 'chia-seeds',
            'description' => 'Nutrient-rich chia seeds for health food and supplements',
            'image'       => 'assets/frontend/images/products/chia-seeds.png',
        ],
        [
            'name'        => 'Turmeric Whole (Roots)',
            'slug'        => 'turmeric-whole',
            'description' => 'Whole dried turmeric roots, sun-cured and carefully cleaned',
            'image'       => 'assets/frontend/images/products/turmeric-whole.png',
        ],
    ],

];
