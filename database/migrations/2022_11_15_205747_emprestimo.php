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
        Schema::create('emprestimo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_livro_emprestimo')->nullable();
            $table->unsignedBigInteger('id_aluno_emprestimo')->nullable();
            $table->string('causa');
            $table->boolean('vencido');
            $table->timestamps();
        });

        Schema::table('emprestimo', function (Blueprint $table) {
            $table->foreign('id_livro_emprestimo')->references('id')->on('Livros')->onDelete('cascade');
            $table->foreign('id_aluno_emprestimo')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimo');
    }
};
