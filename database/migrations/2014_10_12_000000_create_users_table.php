<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            /*
             * 1 = Comum
             * 2 = Editor
             * 3 = Administrador
             */
            $table->unsignedBigInteger('role_id')->default(1);
            $table->index('role_id');

            // FK Pessoa, nem todos os usuários tem uma pessoa e nem toda pessoa tem um usuário
            $table->unsignedBigInteger('pessoa_id')->nullable();
            $table->index('pessoa_id');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
