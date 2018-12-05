<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserRegisterTest extends DuskTestCase
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
public function testRegisterUser()
{
    $this->browse(function (Browser $browser) {
    
        $browser->visit('/');
        $browser->visit('/login');
        $browser->type('email','lesdith@gmail.com');
        $browser->type('password','Lesvia123.');
        $browser->click('button[type="submit"]');
        $browser->assertPathIs('/home');
        $browser->visit('/users');
        $browser->press('Nuevo usuario');
        $browser->type('name','Ana Patricia Terraza Sandoval');
        $browser->type('email','anaterraza@gmail.com');
        $browser->type( 'password','Ana123.');
        $browser->select( 'role_id','2');
        $browser->select('permission_id', '2');
        $browser->radio('#status', 'on');
        $browser->press('Guardar');

     });

     session()->flush();
}
}
