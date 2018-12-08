<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateEventTest extends DuskTestCase
{

    public function setUp(){

        parent::setUp();
        $this->faker = \Faker\Factory::create();
    }
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        sleep(5);

        $this->browse(function (Browser $browser) {
            
            $browser->visit('/');
            $browser->visit('/login');
            $browser->type('email','lesdith@gmail.com');
            $browser->type('password','Lesvia123.');
            $browser->click('button[type="submit"]');
            $browser->assertPathIs('/home');
            $browser->visit('/events');
            $browser->value('#contact','Lesvia Terraza');
            $browser->value('#phone','45789635');
            $browser->press('Guardar');
            $browser->visit('/home');
            $browser->visit('/');

    
        });

        session()->flush();
    }
}
