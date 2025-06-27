<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/login", [AuthController::class, "index"] )->name("login");
Route::get("/register", [AuthController::class, "register"] )->name("register");

Route::resource("user", UserController::class);

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::fallback(function () {
        return redirect('/');
    });
});

