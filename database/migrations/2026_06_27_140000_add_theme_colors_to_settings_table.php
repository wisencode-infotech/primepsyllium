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
            $table->string('primary_color', 7)->nullable()->after('global_presence_image');
            $table->string('secondary_color', 7)->nullable()->after('primary_color');
            $table->string('primary_light_color', 7)->nullable()->after('secondary_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['primary_color', 'secondary_color', 'primary_light_color']);
        });
    }
};
