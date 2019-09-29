<?php

use App\Models\Projeto\Projeto;
use Illuminate\Database\Seeder;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projeto = new Projeto();
        $projeto->nome = 'Projeto PANAN';
        $projeto->descricao = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum';
        $projeto->data_inicio = '2017-01-22';
        $projeto->data_fim = '2017-07-01';
        $projeto->save();

        $projeto = new Projeto();
        $projeto->nome = 'Projeto SIGFIELD';
        $projeto->descricao = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum';
        $projeto->data_inicio = '2018-01-22';
        $projeto->data_fim = '2018-07-01';
        $projeto->save();

        $projeto = new Projeto();
        $projeto->nome = 'Projeto REDE SIGLA';
        $projeto->descricao = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum';
        $projeto->data_inicio = '2016-01-22';
        $projeto->data_fim = '2016-07-01';
        $projeto->save();
    }
}
