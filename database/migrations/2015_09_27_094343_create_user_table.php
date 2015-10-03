<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('id' , 13);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('middlename');
            $table->string('email');
            $table->string('password', 60);
            $table->string('usergroup_id');
            $table->string('barcode_id' ,8)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user');
    }
}
