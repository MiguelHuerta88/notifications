<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // up
        Schema::create('sites', function(Blueprint $table){
            $table->increments('id');
            $table->string('public_key')->unique(); // should these be unique?
            $table->string('private_key')->unique();// should they be unique?
            $table->string('site', 256);
            $table->tinyInteger('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // drop
        Schema::drop('sites');
    }
}
