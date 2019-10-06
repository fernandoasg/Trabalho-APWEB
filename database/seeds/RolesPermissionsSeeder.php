<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //---------------------- ROLES ----------------------

        $roleAdministrador = Role::create(['name' => 'administrador']);
        $roleEditor = Role::create(['name' => 'editor']);

        //---------------------- USUARIOS ----------------------

        $permission = Permission::create(['name' => 'criar usuarios']);
        $permission->assignRole($roleAdministrador);

        $permission = Permission::create(['name' => 'editar usuarios']);
        $permission->assignRole($roleAdministrador);

        $permission = Permission::create(['name' => 'deletar usuarios']);
        $permission->assignRole($roleAdministrador);

        //---------------------- PAPEIS ----------------------

        $permission = Permission::create(['name' => 'criar papeis']);
        $permission->assignRole($roleAdministrador);

        $permission = Permission::create(['name' => 'editar papeis']);
        $permission->assignRole($roleAdministrador);

        $permission = Permission::create(['name' => 'deletar papeis']);
        $permission->assignRole($roleAdministrador);

        //---------------------- PROJETOS ----------------------

        $permission = Permission::create(['name' => 'criar projetos']);
        $permission->assignRole($roleAdministrador);

        $permission = Permission::create(['name' => 'editar projetos']);
        $permission->assignRole($roleAdministrador);

        $permission = Permission::create(['name' => 'deletar projetos']);
        $permission->assignRole($roleAdministrador);

        //---------------------- POSTS ----------------------

        $permission = Permission::create(['name' => 'criar posts']);
        $permission->assignRole($roleAdministrador);
        $permission->assignRole($roleEditor);

        $permission = Permission::create(['name' => 'editar posts']);
        $permission->assignRole($roleAdministrador);
        $permission->assignRole($roleEditor);

        $permission = Permission::create(['name' => 'deletar posts']);
        $permission->assignRole($roleAdministrador);
        $permission->assignRole($roleEditor);

    }
}
