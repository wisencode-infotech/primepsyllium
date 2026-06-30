<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class NewCertificationsSeeder extends Seeder
{
    public function run(): void
    {
        $maxOrder = (int) Certification::query()->max('sort_order');

        $certs = [
            ['name' => 'SHEFEXIL',         'logo' => 'certifications/shefexil.svg', 'show_on_home' => true],
            ['name' => 'Dun & Bradstreet', 'logo' => 'certifications/dun.svg',      'show_on_home' => true],
            ['name' => 'FSSAI',            'logo' => 'certifications/fssai.svg',    'show_on_home' => true],
            ['name' => 'HACCP',            'logo' => 'certifications/haccp.svg',    'show_on_home' => true],
            ['name' => 'ISO 9001',         'logo' => 'certifications/iso.svg',      'show_on_home' => true],
        ];

        foreach ($certs as $i => $cert) {
            Certification::query()->create([
                'name'         => $cert['name'],
                'logo'         => $cert['logo'],
                'is_active'    => true,
                'show_on_home' => $cert['show_on_home'],
                'sort_order'   => $maxOrder + $i + 1,
            ]);
        }
    }
}
