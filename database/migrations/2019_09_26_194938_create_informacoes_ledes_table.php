<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacoesLedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacoes_ledes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email');
            $table->time('horario_abertura');
            $table->time('horario_encerramento');

            // todo: Integração com a API JS do google MAPS e armazenar valores que a API usa - coordenadas
            $table->string('endereco');

            $table->string('telefone');
            $table->string('cep');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informacoes_ledes');
    }
}
