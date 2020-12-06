<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    private function dummyLogin()
    {
        $this->seed();

        $user = User::find(1);
        return $this->actingAs($user)
            ->withSession(['user_id' => $user->id])
            ->get('/');
    }

    public function testNonloginAccess()
    {
        $this->get('/')
            ->assertStatus(200);

        $this->get('/mycart')
            ->assertStatus(302)
            ->assertRedirect('/login');
    }

    public function testLogin()
    {
        $this->assertGuest();

        $this->dummyLogin()
            ->assertStatus(200);

        $this->assertAuthenticated();

        $this->get('/mycart')
            ->assertStatus(200);
    }

    public function testLogout()
    {
        $this->dummyLogin();

        $this->post('/logout')
            ->assertStatus(302)
            ->assertRedirect('/');

        $this->assertGuest();
    }
}
