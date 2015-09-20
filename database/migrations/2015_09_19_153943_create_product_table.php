<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('product' , function($t){
            $t->increments('id');
            $t->string('name');
            $t->decimal('price' , 10,2);
            $t->integer('alert_quantity')->default(10);
            $t->string('imageurl');
            $t->string('barcode_id')->unique()->nullable();
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
        //
    }
}
