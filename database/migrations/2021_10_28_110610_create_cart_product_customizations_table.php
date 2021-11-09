<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductCustomizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product_customizations', function (Blueprint $table) {
            $table->id('cart_product_customization_id');
            $table->foreignId('cart_id');
            $table->string('product_code', 20);
            $table->string('size')->nullable();
            $table->string('milk')->nullable();
            $table->string('flavor')->nullable();
            $table->string('topping')->nullable();
            $table->string('add_in')->nullable();
            $table->timestamps();

            $table->foreign('cart_id')->references('cart_id')->on('carts');
            $table->foreign('product_code')->references('product_code')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_product_customizations');
    }
}
