<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */

    function a_user_may_register_for_an_account_but_must_confirm_their_email_address(){
        $this->visit('register')
            ->type('JohnDoe', 'name')
            ->type('johndoe@example.com', 'email')
            ->type('password123', 'password')
            ->type('password123', 'password_confirmation')
            ->press('Register');

        $this->see('Please confirm your email address.')
            ->seeInDatabase('users', ['name' => 'JohnDoe', 'verified' => 0]);

        $user = User::whereName('JohnDoe')->first();

//        $this->login($user)->see('Could not sign you in.');

        $this->visit("register/confirm/{$user->token}")
            ->see('You are now confirmed. Please login.')
            ->seeInDatabase('users', ['name' => 'JohnDoe', 'verified' => 1]);

    }

    /** @test */
    function a_user_may_login()
    {
        $this->login()->see('you are logged in.');
    }

    protected function login($user = null)
    {
        $user = factory(User::class)->create(['password' => 'newPassword']);

        return $this->visit('login')
            ->type($user->email, 'email')
            ->type('newPassword', 'password')
            ->press('Sign In');
    }
}
