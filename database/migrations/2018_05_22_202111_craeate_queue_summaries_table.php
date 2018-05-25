<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CraeateQueueSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //up
        Schema::create('queue_summaries', function(Blueprint $table){
            $table->increments('id');
            $table->text('summary')->index();
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
        Schema::drop('queue_summaries');
    }
}
