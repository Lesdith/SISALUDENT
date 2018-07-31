<?php

use Illuminate\Database\Seeder;
use Sisaludent\Rol;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Rol::class, 5)->create();
    }
}
