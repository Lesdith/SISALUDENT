<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Municipality;

class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Municipality::class, 5)->create();
    }
}
