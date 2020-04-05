<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class UsersCanCreateIndicatorsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @test
     * @throws \Throwable
     */
    public function users_can_create_indicators()
    {
        $user = User::findOrFail(1);
        $this->browse(function (Browser $browser) use($user){
            $browser->loginAs($user)
                    ->visit('/indicadores/create')
                    ->type('indicator','Test indicator')
                    ->press('#btn-saveupload')
                    ->screenshot('create-indicator')
                    ->assertSee('Indicador creado satisfactoriamente.');
        });
    }
}
