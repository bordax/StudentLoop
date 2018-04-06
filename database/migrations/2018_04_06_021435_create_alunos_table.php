<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome', 100);
            $table->date('nasc');
            $table->integer('serie');
            
            $table->string('cep', 8);
            $table->string('rua', 120);
            $table->string('numero_endereco');
            $table->string('complemento', 50);
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('estado', 2);
            
            $table->string('nome_mae', 100);
            $table->string('cpf', 11);
            $table->integer('venc');

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
        Schema::dropIfExists('alunos');
    }
}
