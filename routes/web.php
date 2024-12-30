<?php

use App\Http\Controllers\AppController;
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
// Route::get("/contact", [AppController::class, "contact"])->name("contact");
Route::get("/latest", [AppController::class, "latestNews"])->name("latest_news");
