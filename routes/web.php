<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login-register');
})->name('login');

Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::post('/forgot', [AuthenticationController::class, 'forgot'])->name('forgot');
Route::post('/reset-password', [AuthenticationController::class, 'reset'])->name('reset');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/reset-password', function () {
    return view('reset-password');
})->name('password.reset');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');