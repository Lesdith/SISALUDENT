<?php

use Illuminate\Database\Seeder;
use Sisaludent\Tooth_position;

class ToothPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Tooth_position::class, 5)->create();
    }
}
