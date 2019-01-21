<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('space_id');
            $table->integer('owner_id');
            $table->integer('user_id');
            $table->string('space_name');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('phone');
            $table->string('message');
            $table->date('schedule');
            $table->time('time');
            $table->boolean('accept')->default(0);
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
        Schema::dropIfExists('appointments');
    }
}
