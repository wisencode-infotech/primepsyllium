<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SettingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (Setting::query()->exists()) {
            return;
        }

        Setting::query()->create([
            'phone' => '+91 91575 73300',
            'email' => 'export@primepsyllium.com',
            'address' => "Survey No. 314/2, S. B. Pura Road, Palanpur, B.K., Gujarat- 385001. INDIA",
            'logo' => $this->copyImage('assets/frontend/images/brand-logo.png'),
            'global_presence_image' => $this->copyImage('assets/frontend/images/globe.png'),
        ]);
    }

    private function copyImage(string $relativeSourcePath): ?string
    {
        $sourcePath = public_path($relativeSourcePath);

        if (! File::exists($sourcePath)) {
            return null;
        }

        $targetPath = 'branding/'.basename($sourcePath);

        if (! Storage::disk('public')->exists($targetPath)) {
            Storage::disk('public')->put($targetPath, File::get($sourcePath));
        }

        return $targetPath;
    }
}
