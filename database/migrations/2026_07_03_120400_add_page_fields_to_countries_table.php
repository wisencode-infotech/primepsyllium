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
            if (! Schema::hasColumn('countries', 'slug')) {
                $table->string('slug')->nullable()->unique()->after('name');
            }
            if (! Schema::hasColumn('countries', 'has_page')) {
                $table->boolean('has_page')->default(false)->after('show_in_footer');
            }
            if (! Schema::hasColumn('countries', 'banner_image')) {
                $table->string('banner_image')->nullable()->after('flag');
            }
            if (! Schema::hasColumn('countries', 'cities')) {
                $table->json('cities')->nullable()->after('banner_image');
            }
            if (! Schema::hasColumn('countries', 'intro_content')) {
                $table->longText('intro_content')->nullable()->after('cities');
            }
            if (! Schema::hasColumn('countries', 'market_demand_content')) {
                $table->longText('market_demand_content')->nullable()->after('intro_content');
            }
            if (! Schema::hasColumn('countries', 'export_capability_content')) {
                $table->longText('export_capability_content')->nullable()->after('market_demand_content');
            }
            if (! Schema::hasColumn('countries', 'quality_standards_content')) {
                $table->longText('quality_standards_content')->nullable()->after('export_capability_content');
            }
            if (! Schema::hasColumn('countries', 'export_logistics_content')) {
                $table->longText('export_logistics_content')->nullable()->after('quality_standards_content');
            }
            if (! Schema::hasColumn('countries', 'faqs')) {
                $table->json('faqs')->nullable()->after('export_logistics_content');
            }
            if (! Schema::hasColumn('countries', 'seo_title')) {
                $table->string('seo_title')->nullable()->after('faqs');
            }
            if (! Schema::hasColumn('countries', 'seo_description')) {
                $table->string('seo_description')->nullable()->after('seo_title');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $columns = array_filter([
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
            ], fn ($column) => Schema::hasColumn('countries', $column));

            if (! empty($columns)) {
                $table->dropColumn($columns);
            }
        });
    }
};
