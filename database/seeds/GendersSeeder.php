<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Gender;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Gender::class, 5)->create();
    }
}
