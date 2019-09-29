<?php

namespace App\Models\Projeto;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    public function membro(){
        return $this->hasMany(Membro::class);
    }
}
