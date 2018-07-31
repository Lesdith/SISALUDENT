<?php

use Illuminate\Database\Seeder;
use Sisaludent\Patient;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Patient::class, 5)->create();
    }
}
