<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('eventName');
            $table->string('eventType');
            $table->date('date');
            $table->time('startTime');
            $table->time('endTime');
            $table->string('city');
            $table->string('buildingAddress');
            $table->string('description');
            $table->unsignedBigInteger('user_Id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_plans');
    }
}
