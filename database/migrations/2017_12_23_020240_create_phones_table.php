<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->hashslug();
            $table->belongsTo('phone_types')->default(\CleaniqueCoders\Profile\Models\PhoneType::HOME);
            $table->unsignedInteger('phoneable_id');
            $table->string('phoneable_type');
            $table->string('phone_number')->nullable();
            $table->is('default');
            $table->standardTime();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
