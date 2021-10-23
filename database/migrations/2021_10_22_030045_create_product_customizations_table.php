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
            $table->string('product_code', 20)->unique();
            $table->string('size');
            $table->string('milk');
            $table->string('flavor');
            $table->string('topping');
            $table->string('add_in');
            // $table->timestamps();

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
