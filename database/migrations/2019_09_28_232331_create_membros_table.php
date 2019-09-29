<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membros', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('data_entrada');
            $table->date('data_saida');

            $table->unsignedBigInteger('projeto_id');
            $table->index('projeto_id');

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
        Schema::dropIfExists('membros');
    }
}
