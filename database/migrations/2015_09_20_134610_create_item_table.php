<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('item' , function($t){
            $t->increments('id');
            $t->string('name');
            $t->string('description');
            $t->integer('quantity')->default(0);
            $t->integer('alert_quantity')->default(10);
            $t->integer('safe_quantity')->default(10);
            $t->string('imageurl');
            $t->string('supplier_id');
            $t->string('itemgroup_id');
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
        Schema::drop('item');
    }
}
