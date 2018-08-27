<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Treatment_plan;

class TreatmentPlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Treatment_plan::class, 5)->create();
    }
}
