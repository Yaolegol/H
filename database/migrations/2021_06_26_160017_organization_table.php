<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('inn');
            $table->string('legal_address')->nullable();
            $table->string('real_address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('certificate_1')->nullable();
            $table->string('certificate_2')->nullable();
            $table->string('certificate_3')->nullable();
            $table->string('certificate_4')->nullable();
            $table->string('certificate_5')->nullable();
            $table->string('photo_1')->nullable();
            $table->string('photo_2')->nullable();
            $table->string('photo_3')->nullable();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('is_approved')->default(false);
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
        //
    }
}
