<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembroPapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membro_papel', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('papel_id');
            $table->index('papel_id');

            $table->unsignedBigInteger('membro_id');
            $table->index('membro_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membro_papel');
    }
}
