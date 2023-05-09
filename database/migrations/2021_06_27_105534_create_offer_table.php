<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferTable extends Migration
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
            $table->text('title');
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->text('contact_person')->nullable();
            $table->string('phone');
            $table->text('working_hours')->nullable();
            $table->text('price');
            $table->text('price_description')->nullable();
            $table->boolean('delivery')->nullable();
            $table->text('delivery_description')->nullable();
            $table->string('photo_1')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->double('map_marker_lat');
            $table->double('map_marker_lng');
            $table->double('rating')->default(0);
            $table->integer('rating_values')->default(0);
            $table->integer('rating_votes')->default(0);
            $table->integer('order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('organization_id')->unsigned()->index()->nullable();
            $table->foreign('organization_id')->references('id')->on('organization')->nullOnDelete();
            $table->bigInteger('catalog_level_one_id')->unsigned()->index()->nullable();
            $table->foreign('catalog_level_one_id')->references('id')->on('catalog_level_one');
            $table->integer('is_approved')->default(0);
            $table->text('approved_error_message')->nullable();
            $table->boolean('is_removed')->default(false);
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
