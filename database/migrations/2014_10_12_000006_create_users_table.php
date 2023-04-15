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
            $table->string('phone')->unique();
            $table->string('name')->default('')->nullable();
            $table->string('description')->default('')->nullable();
            $table->string('avatar')->default('')->nullable();
            $table->string('password');
            $table->bigInteger('lang_id')->unsigned()->index()->nullable();
            $table->foreign('lang_id')->references('id')->on('lang');
            $table->integer('order')->default(1);
            $table->boolean('is_changed')->default(false);
            $table->boolean('is_approved')->default(true);
            $table->text('approved_error_message')->nullable();
            $table->boolean('is_removed')->default(false);
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
