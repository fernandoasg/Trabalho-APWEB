<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_completo');
            $table->char('sexo');
            $table->date('data_nascimento');
            $table->string('curso')->nullable();

            // FK User, nem todos os usuários tem uma pessoa e nem toda pessoa tem um usuário
            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id');
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
        Schema::dropIfExists('pessoa');
    }


}
