<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Detail_treatment_plan;

class DetailTreatmentPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Detail_treatment_plan::class, 5)->create();
    }
}
