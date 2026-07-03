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
        Schema::table('countries', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('name');
            $table->boolean('has_page')->default(false)->after('show_in_footer');
            $table->string('banner_image')->nullable()->after('flag');
            $table->json('cities')->nullable()->after('banner_image');
            $table->longText('intro_content')->nullable()->after('cities');
            $table->longText('market_demand_content')->nullable()->after('intro_content');
            $table->longText('export_capability_content')->nullable()->after('market_demand_content');
            $table->longText('quality_standards_content')->nullable()->after('export_capability_content');
            $table->longText('export_logistics_content')->nullable()->after('quality_standards_content');
            $table->json('faqs')->nullable()->after('export_logistics_content');
            $table->string('seo_title')->nullable()->after('faqs');
            $table->string('seo_description')->nullable()->after('seo_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn([
                'slug',
                'has_page',
                'banner_image',
                'cities',
                'intro_content',
                'market_demand_content',
                'export_capability_content',
                'quality_standards_content',
                'export_logistics_content',
                'faqs',
                'seo_title',
                'seo_description',
            ]);
        });
    }
};
