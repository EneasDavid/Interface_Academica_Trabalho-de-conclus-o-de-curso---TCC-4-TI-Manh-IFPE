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
        Schema::create('medidas_discilinares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_medidas_discilinares')->nullable();
            $table->string('causa');
        });

        Schema::table('medidas_discilinares', function (Blueprint $table) {
            $table->foreign('aluno_medidas_discilinares')->references('id')->on('addresses')->onDelete('cascade');
        });}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medidas_discilinares');
    }
};
