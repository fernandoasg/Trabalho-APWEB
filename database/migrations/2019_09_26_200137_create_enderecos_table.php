<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bairro')->nullable();
            $table->string('rua');
            $table->string('numero');
            $table->string('referencia')->nullable();
            $table->string('cep');

            $table->unsignedBigInteger('cidade_id')->nullable();
            $table->index('cidade_id');

            $table->unsignedBigInteger('estado_id')->nullable();
            $table->index('estado_id');

            $table->unsignedBigInteger('pessoa_id');
            $table->index('pessoa_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
