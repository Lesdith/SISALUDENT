<?php

use Illuminate\Database\Seeder;
use Sisaludent\Treatment_plan;

class TreatmentPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Treatment_plan::class, 5)->create();
    }
}
