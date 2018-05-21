<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // use schema
        Schema::create('subscriptions', function(Blueprint $table){
            $table->increments('id');
            $table->string('endpoint')->index(); // this will be hashed when stored
            $table->text('subscription');
            $table->integer('site_id')->unsigned()->index();
            $table->integer('user_id')->index();
        });

        // set up the foreign key to our sites table
        Schema::table('subscriptions', function($table){
            $table->foreign('site_id')->references('id')->on('sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop table
        Schema::drop('subscriptions');
    }
}
