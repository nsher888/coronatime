<?php

namespace Tests\Feature;

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Models\CountryStatistic;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ForgotPasswordControllerTest extends TestCase
{
    public function testCreate()
    {
        $response = $this->get(route('password.request', app()->getLocale()));

        $response->assertStatus(200);
        $response->assertViewIs('auth.forgot-password');
    }

    public function testStore()
    {
        $user = User::factory()->create();

        $response = $this->post(route('password.email', app()->getLocale()), ['email' => $user->email]);

        $response->assertStatus(302);
        $response->assertSessionHas('status', trans('passwords.sent'));
    }

    public function testUpdatePassword()
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);

        $response = $this->post(route('password.reset', app()->getLocale()), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('status', trans('passwords.reset'));

        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
    }

    public function testStoreWithInvalidEmail()
    {
        $response = $this->post(route('password.email', app()->getLocale()), ['email' => 'invalid']);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    public function testStoreWithNonexistentUser()
    {
        $response = $this->post(route('password.email', app()->getLocale()), ['email' => 'nonexistent@example.com']);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    public function testUpdatePasswordWithInvalidParameters()
    {
        $response = $this->post(route('password.update', app()->getLocale()), []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email', 'password', 'token']);
    }

    public function testUpdatePasswordWithMismatchedPasswords()
    {
        $user = User::factory()->create();
        $token = Password::createToken($user);

        $response = $this->post(route('password.update', app()->getLocale()), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'invalid-password',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');
    }
}
