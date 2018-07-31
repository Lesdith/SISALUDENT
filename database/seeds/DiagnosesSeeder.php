<?php

use Illuminate\Database\Seeder;
use Sisaludent\Diagnosis;

class DiagnosesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Diagnosis::class, 5)->create();
    }
}
