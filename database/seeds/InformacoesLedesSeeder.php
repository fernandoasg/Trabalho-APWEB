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
            'horario_encerramento' => '19:00:00',
        ]);
    }
}
