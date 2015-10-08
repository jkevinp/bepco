<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreteSupplierAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplieraddress', function(Blueprint $t){
            $t->increments('id');
            $t->string('supplier_id');
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
        Schema::drop('supplieraddress');
    }
}
