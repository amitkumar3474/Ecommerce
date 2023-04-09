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
            $table->id();
            $table->integer('status');
            $table->string('name');
            $table->string('sku');
            $table->float('price');
            $table->float('special_price');
            $table->date('special_price_from');
            $table->date('special_price_to');
            $table->string('category');
            $table->text('short_description');
            $table->text('description');
            $table->integer('qty');
            $table->integer('stock_status');
            $table->string('url_key')->unique();
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
