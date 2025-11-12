<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return view('index');
});

//Landing Page routes
Route::get('/login',[GuestController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'userLogin'])->name('login.submit');
Route::get('/register', [GuestController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
//End of Landing Page routes

//User Login Routes
Route::post('/logout', [UserController::class, 'userLogout'])->name('logout.submit');
//End of Login Routes

