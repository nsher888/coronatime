<?php

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

Route::get('register', [RegisterController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->name('login.create')->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->name('login.store')->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

// FOR TESTING ONLY
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/email/verify', [EmailVerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');
