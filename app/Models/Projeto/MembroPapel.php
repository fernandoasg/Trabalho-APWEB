<?php

namespace App\Models\Projeto;

use Illuminate\Database\Eloquent\Model;

class MembroPapel extends Model
{
    protected $fillable = ['papel_id', 'membro_id'];

    public function papel(){
        return $this->belongsTo(Papel::class);
    }

    public function membro(){
        return $this->belongsTo(Membro::class);
    }
}
