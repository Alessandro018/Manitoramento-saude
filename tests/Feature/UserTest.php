<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
    }
    
    public function testParaQuandoLogarUsuarioIrParaHome(){
        $user = factory(User::class)->create();
        
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', $user->password)
                    ->press('Login')
                    ->assertPathIs('/checkup');
        });
    }
}
