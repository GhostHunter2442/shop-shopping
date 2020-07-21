<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('qty')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users')->onCaseCade('delete');
            $table->foreign('product_id')->references('id')->on('products');
            $table->primary(['user_id','product_id']);
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
        Schema::dropIfExists('favorites');
    }
}
