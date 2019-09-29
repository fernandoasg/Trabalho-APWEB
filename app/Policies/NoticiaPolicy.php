<?php

namespace App\Policies;

use App\Models\Noticia;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticiaPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function createPost(User $user, Noticia $noticia){
        return \Auth::user()->role->permission;
    }

    public function updatePost(User $user, Noticia $noticia){
        // todo check if user is admin or editor
        return true;
    }

    public function delelePost(User $user, Noticia $noticia){
        // todo check if user is admin or editor
        return true;
    }

}
