<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_admin')->default(false);
            $table->string('avatar')->default('')->nullable();
            $table->string('name')->default('')->nullable();
            $table->string('description')->default('')->nullable();
            $table->string('phone')->default('')->nullable();
            $table->string('visible_email')->default('')->nullable();
            $table->string('registration_email')->unique();
            $table->timestamp('visible_email_verified_at')->nullable();
            $table->timestamp('registration_email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('lang_id')->unsigned()->index()->nullable();
            $table->foreign('lang_id')->references('id')->on('lang');
            $table->bigInteger('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('city');
            $table->integer('order')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
