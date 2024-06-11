<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello', function () {
    return view('hello', [
        'name' => 'Laravel',
        'greeting' => 'Hello, Laravel!'
    ]);
});

Route::get('/contact',function () {
    return view('contact');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
