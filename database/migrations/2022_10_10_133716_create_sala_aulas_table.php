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
        Schema::create('sala_aulas', function (Blueprint $table) {
            $table->id();
            $table->string('curso');
            $table->unsignedBigInteger('serie');
            $table->string('turno');
            $table->unsignedBigInteger('segundaUm')->nullable();
            $table->unsignedBigInteger('segundaDois')->nullable();
            $table->unsignedBigInteger('segundaTres')->nullable();
            $table->unsignedBigInteger('segundaQuatro')->nullable();
            $table->unsignedBigInteger('segundaCinco')->nullable();
            $table->unsignedBigInteger('segundaSeis')->nullable();
            $table->unsignedBigInteger('tercaUm')->nullable();
            $table->unsignedBigInteger('tercaDois')->nullable();
            $table->unsignedBigInteger('tercaTres')->nullable();
            $table->unsignedBigInteger('tercaQuatro')->nullable();
            $table->unsignedBigInteger('tercaCinco')->nullable();
            $table->unsignedBigInteger('tercaSeis')->nullable();
            $table->unsignedBigInteger('quartaUm')->nullable();
            $table->unsignedBigInteger('quartaDois')->nullable();
            $table->unsignedBigInteger('quartaTres')->nullable();
            $table->unsignedBigInteger('quartaQuatro')->nullable();
            $table->unsignedBigInteger('quartaCinco')->nullable();
            $table->unsignedBigInteger('quartaSeis')->nullable();
            $table->unsignedBigInteger('quintaUm')->nullable();
            $table->unsignedBigInteger('quintaDois')->nullable();
            $table->unsignedBigInteger('quintaTres')->nullable();
            $table->unsignedBigInteger('quintaQuatro')->nullable();
            $table->unsignedBigInteger('quintaCinco')->nullable();
            $table->unsignedBigInteger('quintaSeis')->nullable();
            $table->unsignedBigInteger('sextaUm')->nullable();
            $table->unsignedBigInteger('sextaDois')->nullable();
            $table->unsignedBigInteger('sextaTres')->nullable();
            $table->unsignedBigInteger('sextaQuatro')->nullable();
            $table->unsignedBigInteger('sextaCinco')->nullable();
            $table->unsignedBigInteger('sextaSeis')->nullable();
            $table->timestamps();
        });
        Schema::table('sala_aulas', function (Blueprint $table) {
            //AQui vamos adicionar a chave extrangeira
            $table->foreign('segundaUm')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('segundaDois')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('segundaTres')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('segundaQuatro')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('segundaCinco')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('segundaSeis')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('tercaUm')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('tercaDois')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('tercaTres')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('tercaQuatro')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('tercaCinco')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('tercaSeis')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quartaUm')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quartaDois')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quartaTres')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quartaQuatro')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quartaCinco')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quartaSeis')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quintaUm')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quintaDois')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quintaTres')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quintaQuatro')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quintaCinco')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('quintaSeis')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('sextaUm')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('sextaDois')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('sextaTres')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('sextaQuatro')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('sextaCinco')->references('id')->on('materias')->onDelete('cascade')->nullable();
            $table->foreign('sextaSeis')->references('id')->on('materias')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sala_aulas');
    }
};
