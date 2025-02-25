<?php

use App\Http\Middleware\isVerifiedEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreUsers;
use App\Http\Controllers\ApiController;

Route::get('/', function () {
    return "hiiii";
})->name('dashboard');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::Post('/store-users', [StoreUsers::class, 'store'])->name('register.user');

Route::Post('/send-email-verify', [ApiController::class, 'sendVerifyEmail'])->name('sendverifyemail.user');

Route::get("/account/verify/{token}", [ApiController::class, 'verifyUser'])->name('verify.user');

Route::Post("/login-users", [ApiController::class, 'login'])->name('login.try');

Route::get('/resend-email-verification', function () {
    return view('resend-email-verification');
})->name('resend-email.user'); //->middleware(isVerifiedEmail::class);

