<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->hashslug();
            $table->unsignedInteger('websiteable_id');
            $table->string('websiteable_type');
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->is('default');
            $table->standardTime();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
