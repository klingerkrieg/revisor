<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblTurmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_turmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomeTurma',250);
            $table->string('chave',8)->unique();
            $table->boolean('ativa')->default(true);
            $table->timestamps();
        });

        Schema::create('tbl_turmas_professores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professor_id')->unsigned();
            $table->integer('turma_id')->unsigned();
            $table->foreign('professor_id')->references('id')->on('tbl_usuarios');
            $table->foreign('turma_id')->references('id')->on('tbl_turmas');
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
        Schema::dropIfExists('tbl_turmas');
    }
}
