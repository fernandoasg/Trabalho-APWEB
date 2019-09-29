<?php

use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO roles_permissions (role_id, permission_id) VALUES
        ('2', '1'),
        ('2', '2'),
        ('2', '3'),
        ('3', '4'),
        ('3', '5'),
        ('3', '6');
        ");
    }
}
