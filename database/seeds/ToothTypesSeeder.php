<?php

use Illuminate\Database\Seeder;
use Sisaludent\Tooth_type;

class ToothTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Tooth_type::class, 5)->create();
    }
}
