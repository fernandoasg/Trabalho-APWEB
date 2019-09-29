<?php

use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class PessoasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pessoa = new Pessoa();
        $pessoa->nome_completo = 'Vitor Andrade Guidorizzi';
        $pessoa->sexo = 'M';
        $pessoa->data_nascimento = '1996-10-23';
        $pessoa->curso = 'Engenharia de Software';
        $pessoa->telefone = '(67) 99880-1996';
        $pessoa->user_id = 1;
        $pessoa->endereco_id = 1;
        $pessoa->save();

        $pessoa = new Pessoa();
        $pessoa->nome_completo = 'Fulana da Silva';
        $pessoa->sexo = 'F';
        $pessoa->data_nascimento = '1999-10-23';
        $pessoa->curso = 'Engenharia da Computação';
        $pessoa->telefone = '(67) 91337-8433';
        $pessoa->user_id = 2;
        $pessoa->endereco_id = 2;
        $pessoa->save();

        $pessoa = new Pessoa();
        $pessoa->nome_completo = 'Cliclano da Silva';
        $pessoa->sexo = 'M';
        $pessoa->data_nascimento = '1984-11-12';
        $pessoa->curso = 'Sistemas de Informação';
        $pessoa->telefone = '(67) 914487-8422';
        $pessoa->user_id = 3;
        $pessoa->endereco_id = 3;
        $pessoa->save();
    }
}
