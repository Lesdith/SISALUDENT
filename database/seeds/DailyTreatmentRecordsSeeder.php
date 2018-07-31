<?php

use Illuminate\Database\Seeder;
use Sisaludent\Daily_treatment_record;

class DailyTreatmentRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Daily_treatment_record::class, 5)->create();
    }
}
