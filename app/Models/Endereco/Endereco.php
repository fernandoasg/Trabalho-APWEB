<?php

namespace App\Models\Endereco;

use App\Models\Pessoa;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{

    public $timestamps = false;

    // Um endereço pode ser usado por várias pessoas
    public function pessoa(){
        return $this->hasMany(Pessoa::class);
    }

    public function estado(){
        return $this->hasOne(Estado::class);
    }

    public function cidade(){
        return $this->hasOne(Cidade::class);
    }
}
