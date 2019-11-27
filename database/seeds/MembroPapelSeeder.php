<?php

use App\Models\Projeto\MembroPapel;
use Illuminate\Database\Seeder;

class MembroPapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::insert("INSERT INTO membro_papel (papel_id, membro_id) VALUES (1,1), (2,1), (3,2), (4,3), (5,4);");
        $membroPapel = new MembroPapel();
        $membroPapel->papel_id = 1;
        $membroPapel->membro_id = 1;
        $membroPapel->save();

        $membroPapel = new MembroPapel();
        $membroPapel->papel_id = 2;
        $membroPapel->membro_id = 1;
        $membroPapel->save();

        $membroPapel = new MembroPapel();
        $membroPapel->papel_id = 3;
        $membroPapel->membro_id = 2;
        $membroPapel->save();

        $membroPapel = new MembroPapel();
        $membroPapel->papel_id = 4;
        $membroPapel->membro_id = 3;
        $membroPapel->save();

        $membroPapel = new MembroPapel();
        $membroPapel->papel_id = 5;
        $membroPapel->membro_id = 4;
        $membroPapel->save();

        $membroPapel = new MembroPapel();
        $membroPapel->papel_id = 3;
        $membroPapel->membro_id = 1;
        $membroPapel->save();
    }
}
