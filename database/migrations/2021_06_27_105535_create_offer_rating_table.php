<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_rating', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->text('comment')->nullable();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('offer_id')->unsigned()->index();
            $table->foreign('offer_id')->references('id')->on('offer');
            $table->boolean('is_approved')->default(0);
            $table->boolean('is_removed')->default(0);
            $table->text('approved_error_message')->nullable();
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
        Schema::dropIfExists('offer_rating');
    }
}
