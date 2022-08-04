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
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('phone');
            $table->double('price');
            $table->text('price_description')->nullable();
            $table->string('photo_1')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->double('map_marker_lat')->nullable();
            $table->double('map_marker_lng')->nullable();
            $table->integer('order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('organization_id')->unsigned()->index()->nullable();
            $table->foreign('organization_id')->references('id')->on('organization')->nullOnDelete();
            $table->bigInteger('catalog_level_two_id')->unsigned()->index();
            $table->foreign('catalog_level_two_id')->references('id')->on('catalog_level_two');
            $table->bigInteger('measure_id')->unsigned()->index();
            $table->foreign('measure_id')->references('id')->on('measure');
            $table->bigInteger('country_id')->unsigned()->index()->default(1)->nullable();
            $table->foreign('country_id')->references('id')->on('country');
            $table->bigInteger('region_id')->unsigned()->index();
            $table->foreign('region_id')->references('id')->on('region');
            $table->bigInteger('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('city');
            $table->integer('is_approved');
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
