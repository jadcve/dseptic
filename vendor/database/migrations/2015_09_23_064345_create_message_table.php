<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('Status');
            $table->unsignedInteger('ID_TECH');
            $table->foreign('ID_TECH')->references('id')->on('users')->onDelete('cascade');
//            $table->unsignedInteger('ID_TICKET');
//            $table->foreign('ID_TICKET')->references('id')->on('ticket')->onDelete('cascade');
            $table->text('CONTENT');
                    
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
        Schema::drop('message');
    }
}
