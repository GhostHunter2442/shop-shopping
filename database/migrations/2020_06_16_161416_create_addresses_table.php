<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname',250);
            $table->string('lastname',250);
            $table->string('email')->unique();
            $table->string('phonenumber',12);
            $table->string('adress1',250);
            $table->string('adress2',250);
            $table->string('adress3',250)->nullable();
            $table->string('stdefalse',250)->default('0');
            $table->string('other',250)->nullable();
            $table->integer('user_id')->unsigned();  // forentkey
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('addresses');
    }
}
