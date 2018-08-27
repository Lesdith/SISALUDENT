<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Tooth_stage;

class ToothStagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Tooth_stage::class, 5)->create();
    }
}
