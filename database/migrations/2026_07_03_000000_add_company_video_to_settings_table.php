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
            $table->string('company_video')->nullable()->after('global_presence_image');
            $table->string('company_video_thumbnail')->nullable()->after('company_video');
            $table->string('company_video_title')->nullable()->after('company_video_thumbnail');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['company_video', 'company_video_thumbnail', 'company_video_title']);
        });
    }
};
