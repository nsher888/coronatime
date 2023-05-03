<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StatisticsController;
use App\Mail\VerifyMail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => '{language}'], function () {
    Route::get('/', [SessionController::class, 'redirectToHome'])->name('home');

    Route::middleware(['auth'])->group(function () {
        Route::post('logout', [SessionController::class, 'destroy'])->name('logout');
        Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');

        Route::controller(StatisticsController::class)->group(function () {
            Route::get('dashboard', 'index')->name('dashboard')->middleware('verified');
            Route::get('country-dashboard', 'show')->name('country-dashboard')->middleware('verified');
        });
    });

    Route::middleware(['guest'])->group(function () {
        Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
        Route::view('/reset-password', 'auth.reset-password', ['token' => request()->token, 'email' => request()->email])->name('password.reset');

        Route::prefix('login')->group(function () {
            Route::view('/', 'sessions.create')->name('login.create');
            Route::post('/', [SessionController::class, 'store'])->name('login.store');
        });

        Route::prefix('register')->group(function () {
            Route::view('/', 'register.create')->name('register.create');
            Route::post('/', [RegisterController::class, 'store'])->name('register.store');
        });

        Route::controller(ForgotPasswordController::class)->group(function () {
            Route::post('/forgot-password', 'store')->name('password.email');
            Route::post('/reset-password', 'updatePassword')->name('password.update');
        });
    });

    Route::view('verify-notice', 'auth.verify-email')->name('verification.notice');
    Route::view('/reset-success', 'auth.reset-success')->name('password.success');
    Route::view('/verify-success', 'auth.verify-success')->name('verification.success');
});


