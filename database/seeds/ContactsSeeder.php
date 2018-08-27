<?php

use Illuminate\Database\Seeder;
use IntelGUA\Sisaludent\Contact;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(IntelGUA\Sisaludent\Contact::class, 5)->create();
    }
}
