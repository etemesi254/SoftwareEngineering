<?php

namespace App\Http\Controllers\HomeController;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


Route::get("/redirects",[HomeController::class,"redirects"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});