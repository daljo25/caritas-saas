<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TenantRequestController;


foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {
        Route::get('/', function () {
            return view('app');
        });
        Route::view('/register', 'register')->name('tenant-request.form');
        Route::post('/register', [TenantRequestController::class, 'store'])
        ->middleware('honeypot', 'throttle:5,1')
        ->name('tenant-request.submit');
        Route::get('/privacidad', function () {
            return view('privacidad');
        })->name('privacidad');
        Route::get('/terminos', function () {
            return view('terminos');
        })->name('terminos');
        Route::get('/cookies', function () {
            return view('cookies');
        })->name('cookies');
    });
}
