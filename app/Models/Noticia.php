<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $preenchiveis = ['titulo', 'descricao', ] 
    protected $nao_preechiveis = ['id', 'data_criacao'];
    protected $table = 'noticias';
}
