<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gigs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->string('title');
            $table->string('category');
            $table->string('about');
            $table->integer('basic_price');
            $table->string('basic_description');
            $table->integer('standard_price');
            $table->string('standard_description');
            $table->integer('premium_price');
            $table->string('premium_description');
            $table->string('images');
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
        Schema::dropIfExists('gigs');
    }
}
