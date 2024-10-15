<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialColumnsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'phone')) {
                $table->string('phone')->nullable();
            }
            if (!Schema::hasColumn('users', 'facebook_id')) {
                $table->string('facebook_id')->nullable();
            }
            if (!Schema::hasColumn('users', 'google_id')) {
                $table->string('google_id')->nullable();
            }
            if (!Schema::hasColumn('users', 'apple_id')) {
                $table->string('apple_id')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'facebook_id', 'google_id', 'apple_id']);
        });
    }
}