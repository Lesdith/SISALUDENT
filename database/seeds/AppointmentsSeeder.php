<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Appointment;

class AppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Appointment::class, 5)->create();
    }
}
