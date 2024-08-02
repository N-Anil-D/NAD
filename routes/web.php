<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('extensions');});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/adv-calc', function () { return view('adv-calculator'); })->name('adv.calc');
    Route::get('/adv-calc-records', function () { return view('adv-calculator-records'); })->name('adv.calc.rec');
});
