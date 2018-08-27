<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Service;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Service::class, 5)->create();
    }
}
