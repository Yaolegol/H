<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->integer('order');
            $table->float('price');
            $table->bigInteger('seller_id')->unsigned()->index()->nullable();
            $table->foreign('seller_id')->references('id')->on('seller');
            $table->bigInteger('product_id')->unsigned()->index()->nullable();
            $table->foreign('product_id')->references('id')->on('product');
            $table->bigInteger('measure_id')->unsigned()->index()->nullable();
            $table->foreign('measure_id')->references('id')->on('measure');
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
