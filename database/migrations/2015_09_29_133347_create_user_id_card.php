<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserIdCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useridcard' , function(Blueprint $t){
            $t->increments('id');
            $t->string('user_id')->unique();
            $t->string('path')->nullable();
            $t->string('filename')->nullable();
            $t->string('status');
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
        Schema::drop('useridcard');
    }
}
