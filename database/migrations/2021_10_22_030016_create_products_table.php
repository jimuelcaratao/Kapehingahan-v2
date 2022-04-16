<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            // $table->string('product_code', 20)->primary();
            $table->id('product_code')->from(10000);
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->string('category_name');
            $table->string('brand_name')->nullable();
            $table->string('status')->nullable(); // available or not
            $table->string('stock')->nullable();
            $table->string('stock_measurement')->nullable();
            $table->string('price');
            $table->text('default_photo')->nullable();
            $table->boolean('is_customizable')->default(0);
            $table->integer('viewers');
            $table->softDeletes();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
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
