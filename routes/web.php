<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
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
Route::get("/latest", [ArticleController::class, "latest"])->name("articles.latest");
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.detail');

// Auth
Route::group(["prefix" => "auth", 'as' => 'auth.'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'login_proses'])->name('login-proses');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register-proses', [AuthController::class, 'register_proses'])->name('register-proses');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


// Dashboard
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth']], function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/profile', [ProfileController::class, 'index'])->name('dashboard.profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('dashboard.update-profile');

    Route::resource('articles', ArticleController::class)->except(['show', 'latest']);
    Route::post('/comments/{id}', [CommentController::class, 'store'])->name('comments.store');

    Route::post('/articles/{article}/like', [LikeController::class, 'store'])->name('articles.like');
    Route::delete('/articles/{article}/dislike', [LikeController::class, 'destroy'])->name('articles.dislike');

    // ADMIN
    Route::group(['middleware' => 'user-access:admin', 'as' => 'admin.'], function () {
        Route::resource('users', UserController::class);
        Route::resource('categories', CategoryController::class);
    });
});
