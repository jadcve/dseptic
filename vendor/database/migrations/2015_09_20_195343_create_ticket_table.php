<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function(Blueprint $table) {
            $table->increments('id');
            $table->string('Admin_Notes')->nullable();
            $table->integer('Status')->nullable();
            $table->text('Status_Message')->nullable();
            $table->date('Date')->nullable();
            $table->date('ClosedDate')->nullable();
            $table->string('Repair_Performed')->nullable();
            $table->string('PAID')->nullable();
            $table->string('SYSTEM_BRAND')->nullable();
            $table->string('PERMIT_ID')->nullable();
            $table->string('Apartment')->nullable();
            $table->string('GATE_CODE')->nullable();
            $table->text('Notes')->nullable();
            $table->string('Technician')->nullable();
            $table->string('Price')->nullable();
            $table->text('ADDRESS')->nullable();
            $table->unsignedInteger('ID_TECH');
            $table->foreign('ID_TECH')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('ID_CUSTOMER');
            $table->foreign('ID_CUSTOMER')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('ID_ADMIN');
            $table->foreign('ID_ADMIN')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('ticket');
    }
}
