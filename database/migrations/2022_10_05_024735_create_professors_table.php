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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('sexo');
            $table->string('estadoCivil')->nullable();
            $table->string('nomeMae');
            $table->dateTime('dataNascimento');
            $table->string('naturalidade');
            $table->string('etnia');
            $table->string('rg')->unique();
            $table->string('rgExpedicao');
            $table->string('ufExpeditor');
            $table->string('expeditorRg');
            $table->string('cpf');
            $table->string('numeroCelular')->nullable();
            $table->string('cep');
            $table->string('UF');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numeroCasa');
            $table->string('complementoCasa')->nullable();
            $table->string('grauInstrucao');
            $table->string('profissao');
            $table->string('modalidade');
            $table->string('categoria');
            $table->string('nivelAcesso');
            $table->string('fotoProfessor')->nullable();
            $table->string('TipoSanguineo')->nullable();
            $table->string('nomeUsual')->nullable();
            $table->unsignedBigInteger('id_usuario_to_professors');
            $table->timestamps();
        });
            Schema::table('professors', function (Blueprint $table) {
                //AQui vamo s adicionar a chave extrangeira
                $table->foreign('id_usuario_to_professors')->references('id')->on('users')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
};
