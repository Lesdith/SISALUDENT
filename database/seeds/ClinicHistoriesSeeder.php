<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Clinic_history;

class ClinicHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Clinic_history::class, 5)->create();
    }
}
