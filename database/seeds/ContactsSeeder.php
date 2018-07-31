<?php

use Illuminate\Database\Seeder;
use Sisaludent\Contact;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sisaludent\Contact::class, 5)->create();
    }
}
