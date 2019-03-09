<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->code('swift_code');
            $table->code('bank_code');
            $table->standardTime();
        });

        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->hashslug();
            $table->belongsTo('banks');
            $table->unsignedInteger('bankable_id');
            $table->string('bankable_type');
            $table->string('account_no')->nullable();
            $table->is('default');
            $table->standardTime();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bank_accounts');
        Schema::dropIfExists('banks');
    }
}
