<?php

namespace Database\Seeders;

use App\Models\EmailRecipient;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class EmailRecipientSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (EmailRecipient::query()->exists()) {
            return;
        }

        $settingEmail = Setting::current()->email;

        if (! $settingEmail) {
            return;
        }

        EmailRecipient::query()->create([
            'name' => 'Default Recipient',
            'email' => $settingEmail,
            'is_active' => true,
        ]);
    }
}
