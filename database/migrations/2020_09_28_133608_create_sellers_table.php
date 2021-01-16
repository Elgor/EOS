<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('business_name');
            $table->string('email');
            $table->string('password');
            $table->longText('description');
            $table->string('category');
            $table->string('city');
            $table->string('address');
            $table->string('profile_picture');
            $table->string('phone_number');
            $table->double('final_rating')->default(0.0);
            $table->string('no_rekening');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
}
