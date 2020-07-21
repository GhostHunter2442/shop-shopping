<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {

            $table->string('id',30)->primary();
            $table->integer('user_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->integer('bank_id')->nullable()->unsigned()->default(0);
            $table->integer('paymentid')->unsigned();
            $table->integer('status_order')->unsigned()->default(1);
            $table->string('track_code',100)->default('-');
            $table->string('paypic',200)->nullable()->default('nopic.png');
            $table->decimal('price',10,2)->nullable();
            $table->integer('lastaccount')->unsigned()->nullable();
            $table->string('payment_id',200)->nullable();
            $table->string('distcode',200)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
}
