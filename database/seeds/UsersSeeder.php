<?php

use Illuminate\Database\Seeder;
use Sisaludent\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\User::class, 5)->create();
    }
}
