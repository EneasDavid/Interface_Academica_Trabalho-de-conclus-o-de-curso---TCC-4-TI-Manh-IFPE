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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('fotoAluno')->nullable();
            $table->string('estadoCivil')->nullable();
            $table->string('nomeMae');
            $table->string('TipoSanguineo')->nullable();
            $table->string('dataNascimento');
            $table->string('naturalidade');
            $table->string('nomeUsual')->nullable();
            $table->string('etnia');
            $table->string('rg')->unique();
            $table->string('rgExpedicao');
            $table->string('ufExpeditor');
            $table->string('expeditorRg');
            $table->string('cpf');
            $table->string('numeroCelular')->nullable();
            $table->string('UF');
            $table->string('cep');
            $table->string('cidade');
            $table->string('sexo');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numeroCasa');
            $table->string('complementoCasa')->nullable();
            $table->string('nivelAcesso');
            $table->string('grauInstrucao');
            $table->unsignedBigInteger('anoIngreso');
            $table->unsignedBigInteger('anoCurso');
            $table->string('curso');
            $table->string('turno');
            $table->string('horario')->nullable();
            $table->unsignedBigInteger('id_usuario_to_aluno');
            $table->unsignedBigInteger('id_salaAula');
            $table->timestamps();
        });
        Schema::table('addresses', function (Blueprint $table) {
            //AQui vamo s adicionar a chave extrangeira
            $table->foreign('id_salaAula')->references('id')->on('sala_aulas')->onDelete('cascade');
            $table->foreign('id_usuario_to_aluno')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
