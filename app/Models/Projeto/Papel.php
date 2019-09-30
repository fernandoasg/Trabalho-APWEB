<?php

namespace App\Models\Projeto;

use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $table = 'papeis';

    public $timestamps = false;

    public function membro(){
        return $this->belongsToMany(Membro::class);
    }

}
