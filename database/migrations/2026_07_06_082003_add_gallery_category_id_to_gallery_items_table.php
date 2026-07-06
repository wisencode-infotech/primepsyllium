<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->foreignId('gallery_category_id')->nullable()->after('title')
                ->constrained('gallery_categories')->restrictOnDelete();
        });

        $categoryIds = DB::table('gallery_categories')->pluck('id', 'name');

        foreach ($categoryIds as $name => $id) {
            DB::table('gallery_items')->where('category', $name)->update(['gallery_category_id' => $id]);
        }

        Schema::table('gallery_items', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->enum('category', [
                'Farm Photos',
                'Psyllium Products',
                'Meetings',
                'Trade Show Photos',
                'Buyer Visit',
            ])->default('Farm Photos')->after('title');
        });

        foreach (DB::table('gallery_categories')->get() as $category) {
            DB::table('gallery_items')->where('gallery_category_id', $category->id)->update(['category' => $category->name]);
        }

        Schema::table('gallery_items', function (Blueprint $table) {
            $table->dropConstrainedForeignId('gallery_category_id');
        });
    }
};
