<?php

use App\Models\Projeto\Papel;
use Illuminate\Database\Seeder;

class PapeisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $papel = new Papel();
        $papel->funcao = 'Supervisor';
        $papel->descricao = 'Supervisor geral e SCRUM Master, função principal é supervisionar a execução das atividades e garantir o uso de padrões de projeto/qualidade';
        $papel->data_inicio = '2018-01-22';
        $papel->data_fim = '2018-07-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Supervisor BOSS';
        $papel->descricao = 'Supervisor geral e SCRUM Master, função principal é supervisionar a execução das atividades e garantir o uso de padrões de projeto/qualidade';
        $papel->data_inicio = '2018-07-02';
        $papel->data_fim = '2018-09-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Supervisor ULTRA';
        $papel->descricao = 'Supervisor geral e SCRUM Master, função principal é supervisionar a execução das atividades e garantir o uso de padrões de projeto/qualidade';
        $papel->data_inicio = '2018-09-02';
        $papel->data_fim = '2018-12-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Programador';
        $papel->descricao = 'Programador blablablablablabla';
        $papel->data_inicio = '2017-01-22';
        $papel->data_fim = '2017-07-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Suporte';
        $papel->descricao = 'Suporte blablablablablabla';
        $papel->data_inicio = '2016-01-22';
        $papel->data_fim = '2016-07-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Analista';
        $papel->descricao = 'Analista blablablablablabla';
        $papel->data_inicio = '2016-01-22';
        $papel->data_fim = '2016-07-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Coordenador de Projeto';
        $papel->descricao = 'Coordenador de Projeto blablablablablabla';
        $papel->data_inicio = '2016-01-22';
        $papel->data_fim = '2016-07-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Desenvolvedor';
        $papel->descricao = 'Desenvolvedor blablablablablabla';
        $papel->data_inicio = '2016-01-22';
        $papel->data_fim = '2016-07-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Documentador';
        $papel->descricao = 'Documentador blablablablablabla';
        $papel->data_inicio = '2016-01-22';
        $papel->data_fim = '2016-07-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Gerente de Projetos';
        $papel->descricao = 'Gerente de Projetos blablablablablabla';
        $papel->data_inicio = '2016-01-22';
        $papel->data_fim = '2016-07-01';
        $papel->save();

        $papel = new Papel();
        $papel->funcao = 'Tester';
        $papel->descricao = 'Tester blablablablablabla';
        $papel->data_inicio = '2016-01-22';
        $papel->data_fim = '2016-07-01';
        $papel->save();
    }
}
