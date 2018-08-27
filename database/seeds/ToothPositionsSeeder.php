<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Tooth_position;

class ToothPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Tooth_position::class, 5)->create();
    }
}
