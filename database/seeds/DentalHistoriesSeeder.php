<?php

use Illuminate\Database\Seeder;

class DentalHistoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Dental_history::class, 5)->create();
    }
}
