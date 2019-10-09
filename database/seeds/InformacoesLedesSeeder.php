<?php

use Illuminate\Database\Seeder;

class InformacoesLedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('informacoes_ledes')->insert([
            'nome' => 'Laboratório Ledes',
            'email' => 'ledes.laboratorio@gmail.com',
            'horario_abertura' => '08:00:00',
            'horario_encerramento' => '21:00:00',
            'endereco' => 'Campo Grande MS, Cidade Universitária, caixa postal 549',
            'telefone' => '+55 (67) 3341-9919',
            'cep' => '79070-900'
        ]);
    }
}
