<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

// Auth::routes(['verify' => true]);

Route::get('/', function () {
    return view('index');
});

//Landing Page routes
Route::get('/login',[GuestController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'userLogin'])->name('login.submit');
Route::get('/register', [GuestController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');
Route::get('/report',[GuestController::class, 'showreport'])->name('report.show');
Route::get('/report/fire', [GuestController::class, 'showFireReport'])->name('report.fire');
Route::get('/report/accident', [GuestController::class, 'showAccidentReport'])->name('report.accident');
Route::get('/report/crime', [GuestController::class, 'showFloodReport'])->name('report.flood');
Route::get('/report/flood', [GuestController::class, 'showCrimeReport'])->name('report.report');
//End of Landing Page routes


//Verification Routes
Route::get('/email/verify', function() {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', function (EmailVerificationRequest $request){
   $request->fulfill();
   return redirect('/dashboard')->with('verified', true);
})->middleware(['auth','signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request){
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification  link sent');
})->middleware(['auth','throttle:6,1'])->name('verification.send');
//End of Verification Routes

//User Routes
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])
    ->name('user.dashboard')
    ->middleware(['auth', 'verified']);
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::get('/posts', [PostController::class, 'viewposts'])->name('posts.view')->middleware('auth');
Route::post('/posts', [PostController::class, 'addpost'])->name('posts.store')->middleware('auth');
// Route::delete('/posts/{id}', [PostController::class, 'delpost'])->name('posts.delete')->middleware('auth');

Route::post('/report/fire', [GuestController::class, 'submitFireReport'])->name('guest.fire.submit');
Route::post('/report/flood', [GuestController::class, 'submitFloodReport'])->name('guest.flood.submit');
Route::post('/report/crime', [GuestController::class, 'submitCrimeReport'])->name('guest.crime.submit');
Route::post('/report/accident', [GuestController::class, 'submitAccidentReport'])->name('guest.accident.submit');
