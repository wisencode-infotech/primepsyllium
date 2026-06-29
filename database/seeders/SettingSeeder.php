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
            'favicon' => $this->copyImage('assets/frontend/icons/favicon.png'),
            'facebook_url' => 'https://www.facebook.com/primepsyllium',
            'instagram_url' => 'https://www.instagram.com/primepsyllium/',
            'whatsapp_url' => 'https://api.whatsapp.com/send/?phone=919157573300&text=Hello%2C+Prime+Psyllium%0D%0AI+would+like+to+know+more+about+your+pylluim.&type=phone_number&app_absent=0',
            'twitter_url' => 'https://x.com/primepsyllium',
            'linkedin_url' => 'https://www.linkedin.com/company/prime-psyllium/',
            'teams_url' => 'https://teams.live.com/dl/launcher/launcher.html?url=%2F_%23%2Fl%2Fskype%2Finvite%2FptKnpr6Ak1Q3&type=skype&deeplinkId=1a4b15b7-2726-4efd-a3f0-272893022260&directDl=true&msLaunch=true&enableMobilePage=true&suppressPrompt=true',
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
