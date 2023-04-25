<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ValidationsTest extends TestCase
{
    public function test_register_form_validation()
    {
        $response = $this->post(route('register.store', app()->getLocale()), [
            'username' => '',
            'email' => 'invalid-email',
            'password' => '',
            'password_confirmation' => 'not-matching-password',
        ]);

        $response->assertSessionHasErrors(['username', 'email', 'password']);
    }

    public function test_register_username_is_required()
    {
        $response = $this->post(route('register.store', app()->getLocale()), [
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('username');
    }

    public function test_register_email_is_required()
    {
        $response = $this->post(route('register.store', app()->getLocale()), [
            'username' => 'test',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_register_password_is_required()
    {
        $response = $this->post(route('register.store', app()->getLocale()), [
            'username' => 'test',
            'email' => 'test@test.com',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('password');
    }

    public function test_register_password_confirmation_is_required()
    {
        $response = $this->post(route('register.store', app()->getLocale()), [
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => 'password',
        ]);

        $response->assertSessionHasErrors('password_confirmation');
    }

    public function test_register_password_must_match_password_confirmation()
    {
        $response = $this->post(route('register.store', app()->getLocale()), [
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'notmatchingpassword',
        ]);

        $response->assertSessionHasErrors('password_confirmation');
    }

    public function test_register_username_must_be_unique()
    {
        $user = User::factory()->create();

        $response = $this->post(route('register.store', app()->getLocale()), [
            'username' => $user->username,
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('username');
    }

    public function test_register_email_must_be_unique()
    {
        $user = User::factory()->create();

        $response = $this->post(route('register.store', app()->getLocale()), [
            'username' => 'test',
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_login_with_empty_fields_fails_validation()
    {
        $response = $this->post(route('login.store', app()->getLocale()), []);

        $response->assertSessionHasErrors(['username']);
    }

    public function test_login_with_invalid_credentials_fails_validation()
    {
        $response = $this->post(route('login.store', app()->getLocale()), [
            'username' => 'invaliduser',
            'password' => 'invalidpassword',
        ]);

        $response->assertSessionHasErrors(['username']);
    }

    public function test_login_with_valid_email_succeeds_validation()
    {
        User::factory()->create([
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post(route('login.store', app()->getLocale()), [
            'username' => 'test@test.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('dashboard', app()->getLocale()));
    }

    public function test_login_with_valid_username_succeeds_validation()
    {
        User::factory()->create([
            'username' => 'testuser',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post(route('login.store', app()->getLocale()), [
            'username' => 'testuser',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('dashboard', app()->getLocale()));
    }

}
