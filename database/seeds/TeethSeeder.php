<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Tooth;

class TeethSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Tooth::class, 5)->create();
    }
}
