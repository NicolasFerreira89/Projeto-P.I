<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('animals', function(Blueprint $table)
        {
            $table->id();
            $table->string('tipo');
            $table->string('raca');
            $table->string('genero');
            $table->string('descricao');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('animals');
    }
};