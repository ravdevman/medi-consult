<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/* View */
Route::get("/login", [AuthController::class, "index"] )->name("login");
Route::get("/register", [AuthController::class, "register"] )->name("register");

/* Logic */
Route::post("/user", [UserController::class, "store"] )->name("user.store");
Route::post("/login", [AuthController::class, "login"] )->name("login");


/* Auth protected */
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    //Route::resource("user", UserController::class);

    Route::fallback(function () {
        return redirect('/');
    });
});

