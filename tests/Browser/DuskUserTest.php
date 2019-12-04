<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class DuskUserTest extends DuskTestCase
{
    private $user;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function setUp() : void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function testParaQuandoUsuarioLogarIrParaCheckup(){
        
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', $this->user->email)
                    ->type('password','password')
                    ->press('Login')
                    ->assertPathIs('/checkup');
        });
    }

    public function 

}
