<?php

namespace App\Models;

use App\Models\Endereco\Endereco;
use App\Models\Projeto\Membro;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{

    protected $fillable = [
        'nome_completo', 'sexo', 'data_nascimento', 'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function endereco(){
        return $this->hasOne(Endereco::class);
    }

    /**
     * Pega todos os registros onde a pessoa é membro
     */
    public function membros(){
        return $this->hasMany(Membro::class);
    }
}
