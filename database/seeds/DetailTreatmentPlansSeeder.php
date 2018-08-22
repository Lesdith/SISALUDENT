<?php

use Illuminate\Database\Seeder;

class DetailTreatmentPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Detail_treatment_plan::class, 5)->create();
    }
}
