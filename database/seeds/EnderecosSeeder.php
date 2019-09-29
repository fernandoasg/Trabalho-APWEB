<?php

use App\Models\Endereco\Endereco;
use Illuminate\Database\Seeder;

class EnderecosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $endereco = new Endereco();
        $endereco->bairro = 'Chácara Cachoeira';
        $endereco->rua = 'Rua Dr Oswaldo Arantes Filho';
        $endereco->numero = 934;
        $endereco->referencia = 'Colégio Paulo Freire';
        $endereco->cep = '79040280';
        $endereco->pessoa_id = 1;
        $endereco->cidade_id = 1506;
        $endereco->estado_id = 12;
        $endereco->save();

        $endereco = new Endereco();
        $endereco->bairro = 'Vila Planalto';
        $endereco->rua = 'Rua das Flores Filho';
        $endereco->numero = 877;
        $endereco->referencia = 'Shopping Nort Center';
        $endereco->cep = '78040207';
        $endereco->pessoa_id = 2;
        $endereco->cidade_id = 1506;
        $endereco->estado_id = 12;
        $endereco->save();

        $endereco = new Endereco();
        $endereco->bairro = 'Leblon';
        $endereco->rua = 'Rua Chique de France';
        $endereco->numero = 934;
        $endereco->referencia = 'Pizza Hut';
        $endereco->cep = '79050999';
        $endereco->pessoa_id = 3;
        $endereco->cidade_id = 1506;
        $endereco->estado_id = 12;
        $endereco->save();
    }
}
