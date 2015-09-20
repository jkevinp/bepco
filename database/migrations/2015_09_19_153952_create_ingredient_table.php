<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ingredient' , function($t){
            $t->increments('id');
            $t->string('recipe_id');
            $t->string('name')->unique();
            $t->string('description');
            $t->string('item_id');
            $t->integer('quantity')->default(1);
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
