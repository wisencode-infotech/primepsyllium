<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $superAdminEmail = trim((string) env('SUPER_ADMIN_EMAIL', ''));
        $superAdminName = trim((string) env('SUPER_ADMIN_NAME', ''));
        $superAdminPassword = (string) env('SUPER_ADMIN_PASSWORD', '');

        if ($superAdminEmail === '' || $superAdminName === '' || $superAdminPassword === '') {
            return;
        }

        $role = Role::findOrCreate('super-admin', 'web');

        $superAdmin = User::query()->updateOrCreate(
            ['email' => $superAdminEmail],
            [
                'name' => $superAdminName,
                'password' => $superAdminPassword,
                'email_verified_at' => now(),
            ]
        );

        $superAdmin->assignRole($role);
    }
}
