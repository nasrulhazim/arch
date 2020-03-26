<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->default('-');
            $table->hashslug();
            $table->unsignedInteger('emailable_id');
            $table->string('emailable_type');
            $table->string('email')->nullable();
            $table->is('default');
            $table->standardTime();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('emails');
    }
}
