<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // todo Remover ao passar pra production
        $user = new User();
        $user->name = 'masteruser';
        $user->email = 'masteruser@gmail.com';
        $user->password = Hash::make('masteruser');
        $user->role_id = '3';
        $user->pessoa_id = '1';
        $user->save();

        $user = new User();
        $user->name = 'editoruser';
        $user->email = 'editoruser@gmail.com';
        $user->password = Hash::make('editoruser');
        $user->role_id = '2';
        $user->pessoa_id = '2';
        $user->save();

        $user = new User();
        $user->name = 'commonuser';
        $user->email = 'commonuser@gmail.com';
        $user->password = Hash::make('commonuser');
        $user->role_id = '1';
        $user->pessoa_id = '3';
        $user->save();
    }
}
