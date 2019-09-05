<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordAndUserManagementCompliance extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->datetime('password_expired_at')->nullable()->after('password');
            $table->datetime('account_expired_at')->nullable()->after('email_verified_at');
            $table->boolean('is_first_time_login')->default(false)->after('remember_token');
            $table->boolean('is_password_reset_by_admin')->default(false)->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('password_expired_at');
            $table->dropColumn('account_expired_at');
            $table->dropColumn('is_first_time_login');
            $table->dropColumn('is_password_reset_by_admin');
        });
    }
}
