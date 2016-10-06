<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60)->nullable();
            $table->string('PHONE')->nullable();
            $table->string('PHONE2')->nullable();
            $table->string('PHONE3')->nullable();
            $table->integer('ID_PHONE_COMPANY')->unsigned()->nullable();
            $table->foreign('ID_PHONE_COMPANY')->references('id')->on('phonecompany')->onDelete('cascade');
            $table->integer('ID_PHONE_COMPANY2')->unsigned()->nullable();
            $table->foreign('ID_PHONE_COMPANY2')->references('id')->on('phonecompany')->onDelete('cascade');
            $table->integer('ID_PHONE_COMPANY3')->unsigned()->nullable();
            $table->foreign('ID_PHONE_COMPANY3')->references('id')->on('phonecompany')->onDelete('cascade');
            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('users');
    }

}
