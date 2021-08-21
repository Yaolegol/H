<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SalePointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_point', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('title');
            $table->string('address');
            $table->string('working_hours');
            $table->string('contact_person');
            $table->string('phone');
            $table->bigInteger('organization_id')->unsigned()->index();
            $table->foreign('organization_id')->references('id')->on('organization');
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
