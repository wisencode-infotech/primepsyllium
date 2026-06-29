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
            $table->string('email_brand_name')->nullable()->after('favicon');
            $table->string('email_website_url')->nullable()->after('email_brand_name');
            $table->string('email_logo')->nullable()->after('email_website_url');
            $table->string('email_primary_color', 7)->nullable()->after('email_logo');
            $table->string('email_secondary_color', 7)->nullable()->after('email_primary_color');
            $table->string('email_accent_color', 7)->nullable()->after('email_secondary_color');
            $table->string('email_text_color', 7)->nullable()->after('email_accent_color');
            $table->string('email_background_color', 7)->nullable()->after('email_text_color');
            $table->string('email_button_color', 7)->nullable()->after('email_background_color');
            $table->string('email_button_text_color', 7)->nullable()->after('email_button_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'email_brand_name',
                'email_website_url',
                'email_logo',
                'email_primary_color',
                'email_secondary_color',
                'email_accent_color',
                'email_text_color',
                'email_background_color',
                'email_button_color',
                'email_button_text_color',
            ]);
        });
    }
};
