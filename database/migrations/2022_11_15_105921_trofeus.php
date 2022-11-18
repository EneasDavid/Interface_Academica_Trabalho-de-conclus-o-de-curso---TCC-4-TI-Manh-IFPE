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
        Schema::create('trofeus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_premiado')->nullable();
            $table->string('nomePremiacao');
        });

        Schema::table('trofeus', function (Blueprint $table) {
            $table->foreign('aluno_premiado')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('trofeus');
    }
};
