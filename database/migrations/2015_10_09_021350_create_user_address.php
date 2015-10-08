<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useraddress' , function(Blueprint $t){
            $t->increments('id');
            $t->string('user_id');
            $t->string('street')->nullable();
            $t->string('state');
            $t->string('city');
            $t->string('country')->nullable();
            $t->string('region');
            $t->string('zippostal');
            $t->timestamps();
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
         Schema::drop('useraddress');
    }
}
