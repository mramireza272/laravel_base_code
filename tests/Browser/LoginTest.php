<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @throws \Throwable
     */
    public function registered_users_can_login()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email','admin@ach.cdmx.gob.mx')
                    ->type('password','admin')
                    ->press('#btn-login')
                    ->assertPathIs('/home')
                    ->screenshot('user-login')
                    ->assertAuthenticated();
        });
    }
}
