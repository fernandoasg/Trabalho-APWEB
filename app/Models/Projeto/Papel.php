<?php

namespace App\Models\Projeto;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $table = 'papeis';

    public $timestamps = false;

    protected $fillable = ['funcao','descricao', 'data_inicio', 'data_fim'];

    public function membro(){
        return $this->belongsToMany(Membro::class);
    }

}
