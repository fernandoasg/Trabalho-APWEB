<?php

namespace App\Models\Endereco;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    public $timestamps = false;

    public function estado(){
        return $this->hasOne(Estado::class);
    }
}
