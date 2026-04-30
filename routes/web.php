<?php

use App\Http\Controllers\AddTrainController;
use App\Http\Controllers\PaymentController;
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

Route::post('/register', [UserController::class, 'store'])->name('register');
Route::post('/login', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/downloadPDF/{passenger}', [PaymentController::class, 'downloadPDF'])->middleware('auth')->name('downloadPDF');


// User Profile Routes
Route::get('/profile/{user}', [UserController::class, 'profile'])->middleware('auth');
Route::get('/profile/{user}/edit', [UserController::class, 'editProfile'])->middleware('auth');
Route::put('/profile/{user}', [UserController::class, 'updateProfile'])->middleware('auth');
Route::get('/users', [UserController::class, 'allUsers'])->middleware('auth');

// Public Trains
Route::get('/trains', [AddTrainController::class, 'index']);
Route::get('/passenger-info/{train}', [AddTrainController::class, 'passengerInformation'])->middleware('auth');
Route::post('/pay/{train}', [PaymentController::class, 'checkout'])->middleware('auth');
Route::get('/payment-success', [PaymentController::class, 'success']);

// User Bookings
Route::get('/bookings', [AddTrainController::class, 'showBookings'])->middleware('auth');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AddTrainController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/trains', [AddTrainController::class, 'adminTrains'])->name('admin.trains');
    Route::get('/add-train', function () {
        return view('add-train');
    });
    Route::post('/add-train', [AddTrainController::class, 'store']);
    Route::get('/trains/{train}/edit', [AddTrainController::class, 'editTrain']);
    Route::put('/trains/{train}', [AddTrainController::class, 'updateTrain']);
    Route::delete('/trains/{train}', [AddTrainController::class, 'deleteTrain']);
    Route::get('/bookings', [AddTrainController::class, 'allBookings'])->name('admin.bookings');
});

