<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',250);
            $table->string('slug')->unique();
            $table->decimal('price',10,2);
            $table->integer('stock');
            $table->integer('discount')->default('0')->nullable();
            $table->string('weight',10)->nullable();
            $table->mediumText('detail')->nullable();
            $table->string('picture',200)->default('nopic.png');
            $table->string('picture_detail_one',200)->default('nopic.png');
            $table->string('picture_detail_two',200)->default('nopic.png');
            $table->string('picture_detail_three',200)->default('nopic.png');
            $table->enum('status', ['normal', 'canceled'])->default('normal');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('products');
    }
}
