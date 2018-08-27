<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Tooth_type;

class ToothTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Tooth_type::class, 5)->create();
    }
}
