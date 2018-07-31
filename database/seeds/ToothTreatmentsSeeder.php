<?php

use Illuminate\Database\Seeder;
use Sisaludent\Tooth_treatment;

class ToothTreatmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Tooth_treatment::class, 5)->create();
    }
}
