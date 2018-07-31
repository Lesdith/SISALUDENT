<?php

use Illuminate\Database\Seeder;
use Sisaludent\Doctor;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Doctor::class, 5)->create();
    }
}
