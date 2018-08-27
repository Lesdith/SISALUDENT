<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Dental_history;

class DentalHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Dental_history::class, 5)->create();
    }
}
