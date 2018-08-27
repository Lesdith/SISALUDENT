<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Tooth_treatment;

class ToothTreatmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Tooth_treatment::class, 5)->create();
    }
}
