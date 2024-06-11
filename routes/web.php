<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::get('/hello', function () {
    return view('hello', [
        'name' => 'Laravel',
        'greeting' => 'Hello, Laravel!'
    ]);
});

Route::view('/contact-us','contact')->name('contact');

/*Route::get('/contact',function () {
    return view('contact');
});*/


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
    Route::get('/leads', [LeadController::class,'index'])->name('leads.index');
    Route::get('/leads/create', [LeadController::class,'create'])->name('leads.create');
    Route::post('/leads/store', [LeadController::class,'store'])->name('leads.store');
});
