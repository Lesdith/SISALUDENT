<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\User::class, 5)->create();
    }
}
