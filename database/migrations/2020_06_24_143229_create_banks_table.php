<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('bankpic',200)->default('nopic.png');
            $table->string('detail',200);
            $table->string('subdetail',200);
            $table->string('account',100);
            $table->string('accountid',100);
            $table->integer('stdefalse')->unsigned()->default(0);
            $table->enum('status', ['normal', 'canceled'])->default('normal');
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
        Schema::dropIfExists('banks');
    }
}
