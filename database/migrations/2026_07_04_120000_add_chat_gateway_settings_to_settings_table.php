<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('chat_gateway_url')->nullable()->after('company_video_title');
            $table->text('chat_gateway_secret')->nullable()->after('chat_gateway_url');
            $table->unsignedInteger('chat_gateway_timeout')->nullable()->after('chat_gateway_secret');
        });

        // Carry over whatever is currently configured via .env so the admin
        // screen shows the live values immediately instead of appearing empty.
        $envUrl = config('services.chat_gateway.url');
        $envSecret = config('services.chat_gateway.secret');
        $envTimeout = config('services.chat_gateway.timeout');

        if ($envUrl || $envSecret) {
            DB::table('settings')->limit(1)->update([
                'chat_gateway_url' => $envUrl,
                'chat_gateway_secret' => $envSecret ? Crypt::encryptString($envSecret) : null,
                'chat_gateway_timeout' => $envTimeout,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn(['chat_gateway_url', 'chat_gateway_secret', 'chat_gateway_timeout']);
        });
    }
};
