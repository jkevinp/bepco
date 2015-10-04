<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPhotoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userphoto' , function(Blueprint $t){
            $t->string('id');
            $t->string('path');
            $t->string('filename');
            $t->string('user_id');
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
        Schema::drop('userphoto');
    }
}
