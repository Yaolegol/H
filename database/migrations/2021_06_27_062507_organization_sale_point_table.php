<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrganizationSalePointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_sale_point', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('organization_id')->unsigned()->index();
            $table->foreign('organization_id')->references('id')->on('organization');
            $table->bigInteger('sale_point_id')->unsigned()->index();
            $table->foreign('sale_point_id')->references('id')->on('sale_point');
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
