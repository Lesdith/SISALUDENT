<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\special_exam;

class SpecialExamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Special_exam::class, 5)->create();
    }
}
