<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (Country::query()->exists()) {
            return;
        }

        $footerCountries = ['USA', 'Canada', 'Brazil', 'Russia', 'South Korea'];

        $countries = [
            ['Canada', 'Canada-flag.png'],
            ['Morocco', 'Morocco-flag.png'],
            ['Russia', 'Russai-flag.png'],
            ['Bahrain', 'Bahrain-flag.png'],
            ['South Korea', 'South-Korea-flag.png'],
            ['Sri Lanka', 'Sri-Lanka-flag.png'],
            ['Brazil', 'Brazil-flag.png'],
            ['Turkey', 'Turkey-flag.png'],
            ['South Africa', 'South-Africa-flag.png'],
            ['Ecuador', 'Ecuador-flag.png'],
            ['USA', 'USA-flag.png'],
            ['Australia', 'Australia-flag.png'],
            ['UAE', 'UAE-flag.png'],
            ['Argentina', 'Argentina-flag.png'],
        ];

        foreach ($countries as $index => [$name, $flagFile]) {
            Country::query()->create([
                'name' => $name,
                'flag' => $this->copyImage('assets/frontend/images/'.$flagFile),
                'sort_order' => $index,
                'is_active' => true,
                'show_in_footer' => in_array($name, $footerCountries, true),
            ]);
        }
    }

    private function copyImage(string $relativeSourcePath): ?string
    {
        $sourcePath = public_path($relativeSourcePath);

        if (! File::exists($sourcePath)) {
            return null;
        }

        $targetPath = 'countries/'.basename($sourcePath);

        if (! Storage::disk('public')->exists($targetPath)) {
            Storage::disk('public')->put($targetPath, File::get($sourcePath));
        }

        return $targetPath;
    }
}
