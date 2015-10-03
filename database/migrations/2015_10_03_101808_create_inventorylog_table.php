<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventorylogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventorylog' , function(Blueprint $t){
            $t->increments('id');
            $t->string('proccess');
            $t->string('action');
            $t->string('user_id');
            $t->string('user_name');
            $t->string('message');
            $t->string('fired_at');
            $t->string('field');
            $t->string('param');
            $t->timeStamps();
            $t->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventorylog');
    }
}
