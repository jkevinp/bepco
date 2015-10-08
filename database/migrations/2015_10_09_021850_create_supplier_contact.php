<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplierContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('suppliercontact' , function(Blueprint $t){
            $t->increments('id');
            $t->string('supplier_id');
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
        Schema::drop('suppliercontact');
    }
}
