<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Location;

class LocationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Location::class, 5)->create();
    }
}
