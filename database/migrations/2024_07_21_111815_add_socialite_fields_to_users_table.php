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
  
            Schema::table('users', function (Blueprint $table) {
                $table->string('facebook_id')->nullable()->after('password');
                $table->string('google_id')->nullable()->after('facebook_id');
                $table->string('apple_id')->nullable()->after('google_id');
            });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['facebook_id', 'google_id', 'apple_id']);
    });
    }
};