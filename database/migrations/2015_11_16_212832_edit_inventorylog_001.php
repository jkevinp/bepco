<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditInventorylog001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventorylog' , function(Blueprint $t){
            $t->string('table');
            $t->string('param_id');
            $t->string('param_value');
            $t->string('start_quantity');
            $t->string('end_quantity');
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
