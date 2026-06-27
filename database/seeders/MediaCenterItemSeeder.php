<?php

namespace Database\Seeders;

use App\Models\MediaCenterItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaCenterItemSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (MediaCenterItem::query()->exists()) {
            return;
        }

        $items = [
            [
                'title' => 'World Food Moscow 2025 Participating',
                'description' => 'We are delighted to invite you to visit Prime Psyllium at World Food Expo 2025.',
                'content' => '<h1><br></h1><p><span style="background-color: rgb(255, 255, 255); color: rgb(43, 43, 43);">We are looking forward to welcoming you to Moscow!</span></p><p><span style="background-color: rgb(255, 255, 255); color: rgb(43, 43, 43);">Your Fiber Partner</span></p><p><br></p><p><span style="background-color: rgb(255, 255, 255); color: rgb(43, 43, 43);">Visit us:</span></p><p><span style="background-color: rgb(255, 255, 255); color: rgb(43, 43, 43);">🔹 Stall No.: B1021 | Hall No.: 3-15</span></p><p><span style="background-color: rgb(255, 255, 255); color: rgb(43, 43, 43);">📅 Date: 16th – 19th September 2025</span></p><p><span style="background-color: rgb(255, 255, 255); color: rgb(43, 43, 43);">📍 Venue: Pavilion 3, Crocus Expo IEC, Moscow, Russia</span></p>',
                'event_date' => '2025-09-02',
                'source_image' => 'assets/frontend/images/world-food.png',
            ],
            [
                'title' => 'Fi South America Expo 2025...',
                'description' => 'We are thrilled to announce our participation in Fi South America Expo 2025, one of the most renowned food ingredient exhibitions in the world. This prestigious event brings together global leaders, innovators, and brands in the food & beverage industry.',
                'content' => '<p><br></p><p><span style="background-color: rgb(255, 255, 255); color: rgb(43, 43, 43);">Join us in São Paulo as we showcase our latest products and innovations. Stay tuned for more updates and booth information!</span></p><p><br></p>',
                'event_date' => '2025-08-18',
                'source_image' => 'assets/frontend/images/north-amk.png',
            ],
        ];

        foreach ($items as $index => $item) {
            MediaCenterItem::query()->create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'description' => $item['description'],
                'content' => $item['content'],
                'event_date' => $item['event_date'],
                'image' => $this->copyImage($item['source_image']),
                'sort_order' => $index,
                'is_active' => true,
            ]);
        }
    }

    private function copyImage(string $relativeSourcePath): ?string
    {
        $sourcePath = public_path($relativeSourcePath);

        if (! File::exists($sourcePath)) {
            return null;
        }

        $targetPath = 'media-center/'.basename($sourcePath);

        if (! Storage::disk('public')->exists($targetPath)) {
            Storage::disk('public')->put($targetPath, File::get($sourcePath));
        }

        return $targetPath;
    }
}
