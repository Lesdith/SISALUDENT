<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StateUpdateTest extends DuskTestCase
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
    public function testStateUpdate()
    {
        $this->browse(function (Browser $browser) {
        
            $browser->visit('/');
            $browser->visit('/login');
            $browser->type('email','lesdith@gmail.com');
            $browser->type('password','Lesvia123.');
            $browser->press('Ingresar');
            $browser->assertPathIs('/home');
            $browser->visit('/users');
            $browser->press('');
            $browser->radio('#status', '0');
            $browser->press('Actualizar');
        });
        session()->flush();

    }
}
