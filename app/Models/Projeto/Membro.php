<?php

namespace App\Models\Projeto;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{

    public $timestamps = false;

    /**
     * Pega a pessoa que é o membro
     */
    public function pessoa(){
        return $this->belongsTo(Pessoa::class);
    }

    // Um membro só pode fazer parte de um projeto - (uma pessoa pode ser membro em vários projetos)
    public function projeto(){
        return $this->belongsTo(Projeto::class);
    }

    /**
     * Os vários papeis de um Membro
     */
    public function papeis(){
        return $this->belongsToMany(Papel::class);
    }

}
