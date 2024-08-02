<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MonthlyRideController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

    Route::resource('/drivers', DriverController::class);
    Route::resource('/clients', ClientController::class);
    Route::resource('/orders', OrderController::class);
    Route::get('/unpaid-orders', [OrderController::class, 'unpaid'])->name('orders.unpaid');
    Route::post('/orders/{id}/approve', [OrderController::class, 'approve'])->name('orders.approve');


    Route::resource('/monthly-rides', MonthlyRideController::class);
    Route::get('/unpaid-monthly-rides', [MonthlyRideController::class, 'unpaid'])->name('monthly-rides.unpaid');
    Route::post('/monthly-rides/{id}/approve', [MonthlyRideController::class, 'approve'])->name('monthly-rides.approve');
});
