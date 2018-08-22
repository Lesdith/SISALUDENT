<?php

use Illuminate\Database\Seeder;

class PerformTreatmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Perform_treatment::class, 5)->create();
    }
}
