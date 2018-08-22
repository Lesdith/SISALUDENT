<?php

use Illuminate\Database\Seeder;

class ClinicHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Clinic_history::class, 5)->create();
    }
}
