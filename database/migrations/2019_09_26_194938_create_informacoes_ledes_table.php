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
            $table->timestamps();
        });

        DB::table('informacoes_ledes')->insert([
            'nome' => 'Laboratório Ledes',
            'email' => 'ledes.laboratorio@gmail.com',
            'horario_abertura' => '08:00:00',
            'horario_encerramento' => '19:00:00',
        ]);

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
