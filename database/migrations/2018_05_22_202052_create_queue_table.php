<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //up
        Schema::create('queue', function(Blueprint $table){
            $table->increments('id');
            $table->integer('site_id')->index();
            $table->text('subscription');
            $table->timestamps();
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
        Schema::drop('queue');
    }
}
