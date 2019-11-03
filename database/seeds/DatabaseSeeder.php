<?php

use App\Models\Endereco\Endereco;
use App\Models\Pessoa;
use App\Models\Projeto\Membro;
use App\Models\Projeto\Papel;
use App\Models\Projeto\Projeto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Artisan::call('db:seed', array('--class' => 'CidadeSeeder'));
        Artisan::call('db:seed', array('--class' => 'EnderecosSeeder'));
        Artisan::call('db:seed', array('--class' => 'EstadoSeeder'));
        Artisan::call('db:seed', array('--class' => 'MembrosSeeder'));
        Artisan::call('db:seed', array('--class' => 'InformacoesLedesSeeder'));
        Artisan::call('db:seed', array('--class' => 'PapeisSeeder'));
        Artisan::call('db:seed', array('--class' => 'PessoasSeeder'));
        Artisan::call('db:seed', array('--class' => 'ProjetosSeeder'));
        Artisan::call('db:seed', array('--class' => 'RolesPermissionsSeeder'));
        Artisan::call('db:seed', array('--class' => 'UserSeeder'));
        Artisan::call('db:seed', array('--class' => 'PostSeeder'));

        DB::insert("INSERT INTO membro_papel (papel_id, membro_id) VALUES (1,1), (2,1), (3,2), (4,3), (5,4);");

    }
}
