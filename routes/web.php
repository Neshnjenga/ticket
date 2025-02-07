<?php

use App\Http\Controllers\ForgotController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/registerpost',[UserController::class,'registerpost'])->name('registerpost');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/loginpost',[UserController::class,'loginpost'])->name('loginpost');

Route::get('/forgot',[ForgotController::class,'forgot'])->name('forgot');
Route::post('/forgotpost',[ForgotController::class,'forgotpost'])->name('forgotpost');

Route::get('/reset/{token}',[ForgotController::class,'reset'])->name('reset');
Route::post('/resetpost/{token}',[ForgotController::class,'resetpost'])->name('resetpost');

Route::get('/otp',[UserController::class,'otp'])->name('otp');
Route::post('/otppost',[UserController::class,'otppost'])->name('otppost');

Route::get('/add',[MovieController::class,'add'])->name('add');
Route::post('/addpost',[MovieController::class,'addpost'])->name('addpost');

Route::get('/resend',[UserController::class,'resend'])->name('resend');

Route::get('/home',[UserController::class,'home'])->name('home');

Route::get('/view',[MovieController::class,'view'])->name('view');

Route::get('/check/{name}',[MovieController::class,'check'])->name('check');


Route::get('/logout',[UserController::class,'logout'])->name('logout');