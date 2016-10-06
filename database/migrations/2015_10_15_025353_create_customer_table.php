<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ID_USER');
            $table->foreign('ID_USER')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('LAST_NAME');
            $table->text('ADDRESS');
            $table->text('ADDRESS_ALTERNATIVE');
            $table->string('PERMIT');
//            $table->string('PHONE');
            $table->string('ZIP_CODE');
            
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
        Schema::drop('customer');
    }
}
