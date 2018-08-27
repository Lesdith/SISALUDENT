<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Doctor;

class DoctorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Doctor::class, 5)->create();
    }
}
