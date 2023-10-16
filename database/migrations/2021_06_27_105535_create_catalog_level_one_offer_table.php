<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogLevelOneOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_level_one_offer', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('catalog_level_one_id')->unsigned()->index();
            $table->foreign('catalog_level_one_id')->references('id')->on('catalog_level_one');
            $table->bigInteger('offer_id')->unsigned()->index();
            $table->foreign('offer_id')->references('id')->on('offer');
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
        Schema::dropIfExists('catalog_level_one_offer');
    }
}
