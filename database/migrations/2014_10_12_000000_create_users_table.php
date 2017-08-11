<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id');
            $table->integer('account_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('tin_number');
            $table->string('occupation');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->string('token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
