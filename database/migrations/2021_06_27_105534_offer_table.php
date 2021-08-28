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
            $table->boolean('is_active');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('catalog_level_two_id')->unsigned()->index();
            $table->foreign('catalog_level_two_id')->references('id')->on('catalog_level_two');
            $table->bigInteger('measure_id')->unsigned()->index()->nullable();
            $table->foreign('measure_id')->references('id')->on('measure');
            $table->bigInteger('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('country');
            $table->bigInteger('region_id')->unsigned()->index();
            $table->foreign('region_id')->references('id')->on('region');
            $table->bigInteger('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('city');
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
        Schema::dropIfExists('offer');
    }
}
