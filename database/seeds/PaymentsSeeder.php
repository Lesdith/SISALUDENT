<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Payment;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Payment::class, 5)->create();
    }
}
