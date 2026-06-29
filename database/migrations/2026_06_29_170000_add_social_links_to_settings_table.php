<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('facebook_url')->nullable()->after('favicon');
            $table->string('instagram_url')->nullable()->after('facebook_url');
            $table->string('whatsapp_url')->nullable()->after('instagram_url');
            $table->string('twitter_url')->nullable()->after('whatsapp_url');
            $table->string('linkedin_url')->nullable()->after('twitter_url');
            $table->string('teams_url')->nullable()->after('linkedin_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'facebook_url',
                'instagram_url',
                'whatsapp_url',
                'twitter_url',
                'linkedin_url',
                'teams_url',
            ]);
        });
    }
};
