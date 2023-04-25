<?php

namespace Tests\Feature;

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_user_can_register_successfully()
    {
        $response = $this->post(route('register.store', app()->getLocale()), [
            'username' => 'test',
            'email' => 'test@test.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('verification.notice', app()->getLocale()));
    }

    public function test_login_redirect_to_dashboard_successfully()
    {
        User::factory()->create([
            'email' => 'test@test.com',
            'username' => 'test',
            'password' => bcrypt('password'),
        ]);

        $response = $this->post(route('login.store', app()->getLocale()), [
            'email' => 'test@test.com',
            'username' => 'test',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('dashboard', app()->getLocale()));
    }

    public function test_auth_user_can_access_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('dashboard', app()->getLocale()));

        $response->assertStatus(200);
    }

    public function test_unauth_user_cannot_access_dashboard()
    {
        $response = $this->get(route('dashboard', app()->getLocale()));

        $response->assertStatus(302);
        $response->assertRedirect(route('login.store', app()->getLocale()));
    }

    public function test_auth_user_can_logout()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('logout', app()->getLocale()));

        $response->assertStatus(302);
        $response->assertRedirect(route('login.store', app()->getLocale()));
    }

    public function test_show_forgot_password_form()
    {
        $response = $this->get(route('password.request', ['language' => app()->getLocale()]));
        $response->assertOk();
        $response->assertViewIs('auth.forgot-password');
    }

}
