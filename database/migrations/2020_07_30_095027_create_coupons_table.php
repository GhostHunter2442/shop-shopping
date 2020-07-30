<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',200);
            $table->integer('percen');
            $table->decimal('discount',10,2);
            $table->string('code',15);
            $table->timestamp('end_datetime');
            $table->mediumText('product_id')->nullable();
            $table->text('detail')->nullable();
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
        Schema::dropIfExists('coupons');
    }
}
