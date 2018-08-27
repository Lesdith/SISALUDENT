<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Department;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Department::class, 5)->create();
    }
}
