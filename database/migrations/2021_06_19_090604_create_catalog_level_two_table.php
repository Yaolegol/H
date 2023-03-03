<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogLevelTwoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_level_two', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('link');
            $table->string('image');
            $table->text('image_licence_link');
            $table->integer('order');
            $table->bigInteger('catalog_level_one_id')->unsigned()->index();
            $table->foreign('catalog_level_one_id')->references('id')->on('catalog_level_one');
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
        Schema::dropIfExists('catalog_level_two');
    }
}
