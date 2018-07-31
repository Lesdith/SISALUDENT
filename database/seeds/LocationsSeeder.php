<?php

use Illuminate\Database\Seeder;
use Sisaludent\Location;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Location::class, 5)->create();
    }
}
