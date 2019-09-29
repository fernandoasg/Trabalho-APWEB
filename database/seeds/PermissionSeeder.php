<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permission = new Permission();
        $permission->name = 'Criar Noticia';
        $permission->label = 'create-noticia';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Atualizar Noticia';
        $permission->label = 'update-noticia';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Deletar Noticia';
        $permission->label = 'delete-noticia';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Criar User';
        $permission->label = 'create-user';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Alterar User';
        $permission->label = 'update-user';
        $permission->save();

        $permission = new Permission();
        $permission->name = 'Deletar User';
        $permission->label = 'delete-user';
        $permission->save();

    }
}
