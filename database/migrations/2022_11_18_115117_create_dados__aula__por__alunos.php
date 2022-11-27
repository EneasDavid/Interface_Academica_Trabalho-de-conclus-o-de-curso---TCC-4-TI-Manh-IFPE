<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados__aula__por__alunos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aluno');
            $table->unsignedBigInteger('id_materia')->nullable();
            $table->unsignedBigInteger('qtd_falta_geral');
            $table->unsignedBigInteger('qtd_falta_Um');
            $table->unsignedBigInteger('qtd_falta_Dois');
            $table->unsignedBigInteger('qtd_falta_Tres');
            $table->unsignedBigInteger('qtd_falta_Quatro');
            $table->unsignedBigInteger('notaUm')->nullable();
            $table->unsignedBigInteger('notaDois')->nullable();
            $table->unsignedBigInteger('notaTres')->nullable();
            $table->unsignedBigInteger('notaQuatro')->nullable();
            $table->boolean('situacao');
            $table->timestamps();
        });
        
        Schema::table('dados__aula__por__alunos', function (Blueprint $table) {
            $table->foreign('id_aluno')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('id_materia')->references('id')->on('materias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dados__aula__por__aluno');
    }
};
