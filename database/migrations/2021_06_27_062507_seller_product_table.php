<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellerProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller-product', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('seller_id')->unsigned()->index()->nullable();
            $table->foreign('seller_id')->references('id')->on('seller');
            $table->bigInteger('product_id')->unsigned()->index()->nullable();
            $table->foreign('product_id')->references('id')->on('product');
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
        //
    }
}
