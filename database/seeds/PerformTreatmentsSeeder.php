<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Perform_treatment;

class PerformTreatmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Perform_treatment::class, 5)->create();
    }
}
