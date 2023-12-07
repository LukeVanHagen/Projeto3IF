<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->enum('dia', ['Segunda', 'Terca', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo']);
            $table->enum('periodo', ['tarde', 'manha']);
            $table->foreignId('turma_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('horarios');
    }
};