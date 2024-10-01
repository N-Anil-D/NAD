<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleSocialiteController;

Route::get('/', function () { return view('extensions');});
Route::get('auth/google', [GoogleSocialiteController::class, 'redirectToGoogle']);  // redirect to google login
Route::get('google/callback', [GoogleSocialiteController::class, 'handleCallback']);    // callback route after google account chosen
Route::get('/log-in', function () { return view('auth.log-in');})->name('custom.login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/adv-calc', function () { return view('adv-calculator'); })->name('adv.calc');
    Route::get('/adv-calc-records', function () { return view('adv-calculator-records'); })->name('adv.calc.rec');
    Route::get('/usr-url-lim-1', function () { return view('user-url-limitation'); })->name('usr.url.lim1');
});
