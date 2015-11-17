<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions;
    
    /** @test */
    public function a_user_can_register_for_an_account_but_must_confirm_their_email_address()
    {
        $this->visit('register')
            ->type('JohnDoe', 'name')
            ->type('john@example.com', 'email')
            ->type('password213', 'password')
            ->type('password213', 'password_confirmation')
            ->press('Register');

        $this->see('Please confirm your email address.')
            ->seeInDatabase('users', ['name' => 'JohnDoe', 'verified' => 0]);
    }

}
