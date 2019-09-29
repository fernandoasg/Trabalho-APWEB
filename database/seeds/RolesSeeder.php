<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Comum';
        $role->label = 'Usuário Comum';
        $role->description = 'Usuário Comum, não tem permissões especiais';
        $role->save();

        $role = new Role();
        $role->name = 'Editor';
        $role->label = 'Usuário Editor';
        $role->description = 'Usuário Editor, pode criar, altera e remover qualquer notícia';
        $role->save();

        $role = new Role();
        $role->name = 'Administrador';
        $role->label = 'Usuario Administrador';
        $role->description = 'Usuario Administrador, pode criar, altera e remover qualquer notícia além de criar, alterar e remover qualquer usuário';
        $role->save();
    }
}
