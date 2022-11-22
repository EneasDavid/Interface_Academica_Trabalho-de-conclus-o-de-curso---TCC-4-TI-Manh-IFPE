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
        Schema::create('address_emprestimo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('address_id')->nullable();
            $table->unsignedBigInteger('emprestimo_id')->nullable();
            $table->boolean('vencido')->nullable();
            $table->timestamps();
        });

        Schema::table('address_emprestimo', function (Blueprint $table) {
            $table->foreign('address_id')->references('id')->on('Livros')->onDelete('cascade');
            $table->foreign('emprestimo_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_emprestimo');
    }
};
