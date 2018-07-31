<?php

use Illuminate\Database\Seeder;
use Sisaludent\Specialty;

class SpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Specialty::class, 5)->create();
    }
}
