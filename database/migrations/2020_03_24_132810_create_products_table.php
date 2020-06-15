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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('brand_id')->index();
            $table->unsignedBigInteger('category_id')->index();

            $table->string('name');
           
            $table->text('description')->nullable();
            $table->text('shipping')->nullable();
            $table->unsignedInteger('quantity');
            $table->string('slug');
            $table->unsignedDouble('price', 8, 2)->nullable();
            $table->unsignedDouble('sale_price', 8, 2)->nullable();
           // $table->boolean('status')->default(1);
            $table->boolean('featured')->default(0);
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

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