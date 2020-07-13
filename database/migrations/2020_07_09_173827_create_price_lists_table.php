<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->comment('Продавец');
            $table->unsignedBigInteger('manufacturer_id')->comment('Производитель');
            $table->unsignedBigInteger('product_id')->comment('Товар');
            $table->unsignedBigInteger('model_id')->comment('Модель');
            $table->decimal('price');

            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('model_id')->references('id')->on('models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_lists');
    }
}
