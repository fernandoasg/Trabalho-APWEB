<?php

namespace App\Models\Projeto;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = ['nome','descricao', 'data_inicio', 'data_fim'];

    public function membro(){
        return $this->hasMany(Membro::class);
    }
}
