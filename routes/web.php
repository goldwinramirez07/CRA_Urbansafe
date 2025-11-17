<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;

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

//Verification Routes
Route::get('/email/verify', function() {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', function (Request $request){
   $request->fulfill();
   return redirect('/dashboard')->with('success', 'Email verified!');
})->middleware(['auth','signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification  link sent');
})->middleware(['auth','throttle:6,1'])->name('verification.send');
//End of Verification Routes

//User Routes
Route::get('/dashboard', function () {
    return view('/users/dashboard');
})->middleware(['auth', 'verified']);

Route::post('/posts', [PostController::class, 'addpost'])->name('posts.store')->middleware('auth');
// Route::delete('/posts/{id}', [PostController::class, 'delpost'])->name('posts.delete')->middleware('auth');
