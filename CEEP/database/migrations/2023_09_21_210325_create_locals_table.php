<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->string('aparelho_mac');
            $table->string('nome');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('locals');
    }
}
