<?php

use App\Http\Controllers\AddTrainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/homepage', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about-us');
});

Route::get('/contact-us', function () {
    return view('contact-us');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::get('/trains', [AddTrainController::class, 'index']);

Route::get('/add-train', function () {
    return view('add-train');
});

Route::post('/add-train', [AddTrainController::class, 'store']);

Route::post('/register', [UserController::class, 'store'])->name('register');

Route::post('/login', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');