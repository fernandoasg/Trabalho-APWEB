<?php

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
        DB::insert("INSERT INTO permissions (role, description) VALUES
        ('Usuário Comum', 'usuário comum, não tem permissões especiais'),
        ('Editor', 'usuário editor, pode editar, criar e remover notícias'),
        ('Administrador', 'usuário administrador, pode fazer as funções de editor, criar, alterar e remover usuários, além de conceder permissões de ADM para outros usuários');
        ");
    }
}
