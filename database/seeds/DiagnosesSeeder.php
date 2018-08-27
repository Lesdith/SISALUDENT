<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Diagnosis;

class DiagnosesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Diagnosis::class, 5)->create();
    }
}
