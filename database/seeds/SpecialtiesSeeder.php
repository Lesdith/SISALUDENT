<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Specialty;

class SpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Specialty::class, 5)->create();
    }
}
