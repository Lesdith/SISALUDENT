<?php

use Illuminate\Database\Seeder;
use Sisaludent\Appointment;

class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Appointment::class, 5)->create();
    }
}
