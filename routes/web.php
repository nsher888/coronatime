<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StatisticsController;
use App\Mail\VerifyMail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/en/dashboard', 301);

Route::group(['prefix' => '{language}'], function () {
    Route::get('login', [SessionController::class, 'create'])->name('login.create')->middleware('guest');

    Route::get('register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

    Route::post('login', [SessionController::class, 'store'])->name('login.store')->middleware('guest');

    Route::post('logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

    Route::view('verify-notice', 'auth.verify-email')->name('verification.notice');

    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

    Route::get('/reset-password', [ForgotPasswordController::class, 'create'])->name('password.reset');

    Route::post('/reset-password', [ForgotPasswordController::class, 'updatePassword'])->name('password.update');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');

    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
        ->middleware(['auth', 'signed'])
        ->name('verification.verify');

    Route::view('/reset-success', 'auth.reset-success')->name('password.success');

    Route::view('/verify-success', 'auth.verify-success')->name('verification.success');

    Route::get('dashboard', [StatisticsController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::get('country-dashboard', [StatisticsController::class, 'show'])
        ->middleware(['auth', 'verified'])
        ->name('country-dashboard');


});
