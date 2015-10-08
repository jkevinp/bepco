<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserContactInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
        Schema::create('usercontact' , function(Blueprint $t){
            $t->increments('id');
            $t->string('user_id');
            $t->string('phone');
            $t->string('mobile');
            $t->string('facebook');
            $t->string('additionalemail');
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
        Schema::drop('usercontact');
    }
}
