<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBarcode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('userbarcode' , function($t){
            $t->increments('id');
            $t->string('barcodekey');
            $t->string('user_id')->unique();
            $t->string('filename');
             $t->string('path');
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
        Schema::drop('userbarcode');
    }
}
