<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTable extends Migration
{
    public function up()
    {
        Schema::create('registro', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rfid');
            $table->foreign('rfid')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('data_hora');
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')->references('id')->on('local')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registro');
    }
}
