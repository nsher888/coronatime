<?php

use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function test_it_verifies_user_email_and_redirects_to_home_page_if_email_is_already_verified()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        Auth::login($user);


        $response = $this->get(route('verification.verify', ['language' => app()->getLocale(), 'id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]));

        $response->assertRedirect(config('fortify.home'));
        $this->assertAuthenticatedAs($user);
    }


}
