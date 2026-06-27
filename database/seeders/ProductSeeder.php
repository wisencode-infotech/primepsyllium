<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (Product::query()->exists()) {
            return;
        }

        $items = [
            [
                'name' => 'Psyllium Husk',
                'slug' => 'psyllium-husk',
                'description' => 'Premium quality whole husk for diverse industries',
                'image' => 'assets/frontend/images/product1.png',
            ],
            [
                'name' => 'Psyllium Husk Powder',
                'slug' => 'psyllium-husk-powder',
                'description' => 'Fine powder for versatile pharmaceutical & food applications',
                'image' => 'assets/frontend/images/product3.png',
            ],
            [
                'name' => 'Psyllium Seed',
                'slug' => 'psyllium-seed',
                'description' => 'Pure whole seeds with high mucilage content',
                'image' => 'assets/frontend/images/product2.png',
            ],
            [
                'name' => 'Psyllium Seed Powder',
                'slug' => 'psyllium-seed-powder',
                'description' => 'Finely milled seed powder for industrial use',
                'image' => 'assets/frontend/images/product1.png',
            ],
            [
                'name' => 'Psyllium Khakha Powder',
                'slug' => 'psyllium-khakha-powder',
                'description' => 'By-product powder with unique nutritional profile',
                'image' => 'assets/frontend/images/product2.png',
            ],
        ];

        foreach ($items as $index => $item) {
            $image = $this->copyImage($item['image'], 'products');

            Product::query()->create([
                'name' => $item['name'],
                'slug' => $item['slug'] ?? Str::slug($item['name']),
                'description' => $item['description'] ?? null,
                'image' => $image,
                'sort_order' => $index,
                'is_active' => true,
            ]);
        }
    }

    private function copyImage(string $relativeSourcePath, string $targetDirectory): ?string
    {
        $sourcePath = public_path($relativeSourcePath);

        if (! File::exists($sourcePath)) {
            return null;
        }

        $targetPath = $targetDirectory.'/'.basename($sourcePath);

        if (! Storage::disk('public')->exists($targetPath)) {
            Storage::disk('public')->put($targetPath, File::get($sourcePath));
        }

        return $targetPath;
    }
}
