<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCustomerTable001 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer' , function(Blueprint $t){
            $t->dropColumn('username');
            $t->dropColumn('password');
            $t->dropColumn('activated');
            $t->string('cellphone');
            $t->string('street_address');
            $t->string('telephone');
            
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
