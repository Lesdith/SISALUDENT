<?php

use Illuminate\Database\Seeder;

class SpecialExamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Special_exam::class, 5)->create();
    }
}
