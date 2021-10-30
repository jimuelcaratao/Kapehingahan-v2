<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCustomizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_customizations', function (Blueprint $table) {
            $table->id('product_customization_id');
            $table->foreignId('order_item_id');
            $table->string('product_code', 20);
            $table->string('size')->nullable();
            $table->string('milk')->nullable();
            $table->string('flavor')->nullable();
            $table->string('topping')->nullable();
            $table->string('add_in')->nullable();
            $table->timestamps();

            $table->foreign('order_item_id')->references('order_item_id')->on('order_items');
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
        Schema::dropIfExists('product_customizations');
    }
}
