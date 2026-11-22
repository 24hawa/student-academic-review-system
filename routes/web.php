<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function () {
    return back();
})->name('login.attempt');

Route::get('/', fn () => redirect()->route('login'));
