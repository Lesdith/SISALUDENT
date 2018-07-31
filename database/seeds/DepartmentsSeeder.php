<?php

use Illuminate\Database\Seeder;
use Sisaludent\Department;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Department::class, 5)->create();
    }
}
