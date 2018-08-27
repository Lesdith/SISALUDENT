<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Patient;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Patient::class, 5)->create();
    }
}
