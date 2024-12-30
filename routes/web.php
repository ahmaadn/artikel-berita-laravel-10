<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [AppController::class, "index"])->name("home");
Route::get("/about", [AppController::class, "about"])->name("about");
Route::get("/latest", [AppController::class, "latestNews"])->name("latest_news");

// Auth
Route::group(["prefix" => "auth", 'as' => 'auth.'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register-proses', [AuthController::class, 'register_proses'])->name('register-proses');
});


// Dashboard
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
