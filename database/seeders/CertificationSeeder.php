<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CertificationSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (Certification::query()->exists()) {
            return;
        }

        $certifications = [
            ['name' => 'Sedex', 'file' => 'sedex.webp'],
            ['name' => 'FSSC 22000', 'file' => 'fssc.webp'],
            ['name' => 'FDA Approved', 'file' => 'fda.webp'],
            ['name' => 'GMP Quality', 'file' => 'gmp.webp'],
            ['name' => 'KLBD', 'file' => 'klbd.webp'],
            ['name' => 'HALAL', 'file' => 'halal.webp'],
        ];

        foreach ($certifications as $index => $certification) {
            $logo = $this->copyImage(
                'assets/frontend/images/certificate/'.$certification['file'],
                'certifications'
            );

            Certification::query()->create([
                'name' => $certification['name'],
                'logo' => $logo,
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
