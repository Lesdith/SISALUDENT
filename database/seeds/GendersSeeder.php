<?php

use Illuminate\Database\Seeder;
use Sisaludent\Gender;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Gender::class, 5)->create();
    }
}
