<?php

use Illuminate\Database\Seeder;
use Sisaludent\Tooth;

class TeethSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Tooth::class, 5)->create();
    }
}
