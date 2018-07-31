<?php

use Illuminate\Database\Seeder;
use Sisaludent\Municipality;

class MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Municipality::class, 5)->create();
    }
}
