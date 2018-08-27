<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Rol;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Rol::class, 5)->create();
    }
}
