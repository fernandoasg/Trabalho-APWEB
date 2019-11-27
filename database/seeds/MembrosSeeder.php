<?php

use App\Models\Projeto\Membro;
use Illuminate\Database\Seeder;

class MembrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membro = new Membro();
        $membro->data_entrada = '2018-01-22';
        $membro->data_saida = '2018-07-01';
        $membro->projeto_id = 1;
        $membro->pessoa_id = 1;
        $membro->save();

        $membro = new Membro();
        $membro->data_entrada = '2019-01-22';
        $membro->data_saida = '2019-07-01';
        $membro->projeto_id = 2;
        $membro->pessoa_id = 1;
        $membro->save();

        $membro = new Membro();
        $membro->data_entrada = '2019-01-22';
        $membro->data_saida = '2019-07-01';
        $membro->projeto_id = 3;
        $membro->pessoa_id = 1;
        $membro->save();

        $membro = new Membro();
        $membro->data_entrada = '2017-01-22';
        $membro->data_saida = '2017-07-01';
        $membro->pessoa_id = 2;
        $membro->projeto_id = 2;
        $membro->save();

        $membro = new Membro();
        $membro->data_entrada = '2016-01-22';
        $membro->data_saida = '2016-07-01';
        $membro->projeto_id = 3;
        $membro->pessoa_id = 3;
        $membro->save();
    }
}
