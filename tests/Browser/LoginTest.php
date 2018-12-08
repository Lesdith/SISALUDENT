<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        sleep(5);

        $this->browse(function (Browser $browser) {
            $browser->visit('/');
            $browser->visit('/login');
            $browser->type('email','lesdith@gmail.com');
            $browser->type('password','Lesvia123.');
            $browser->click('button[type="submit"]');
            $browser->assertPathIs('/home');
            $browser->visit('/home');
            $browser->visit('/');


            // $this->browse(function (Browser $browser) {
            //     $browser->visit('/')
            //             ->assertSee('Laravel');
         });

         session()->flush();
    }
}
