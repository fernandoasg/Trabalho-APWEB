<?php

namespace App\Models\Projeto;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{

    public $timestamps = false;

    protected $fillable = ['data_entrada', 'data_saida', 'projeto_id', 'pessoa_id'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

    public function projeto(){
        return $this->belongsTo(Projeto::class);
    }

    public function papeis(){
        return $this->belongsToMany(Papel::class);
    }

}
