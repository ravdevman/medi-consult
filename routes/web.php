<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
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

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', function () {
        $user = auth()->user();

        if ($user->isDoctor()) {
            return redirect()->route('doctor.dashboard');
        } elseif ($user->isPatient()) {
            return redirect()->route('patient.portal');
        }

        return view('welcome');
    });

    Route::middleware(['doctor'])->prefix('doctor')->name('doctor.')->group(function () {
        Route::get('/dashboard', [DoctorController::class, 'index'])->name('dashboard');
        Route::post('/slot/store', [DoctorController::class, 'addSlot'])->name('addSlot');
    });

    Route::middleware(['patient'])->prefix('patient')->name('patient.')->group(function () {
        Route::get('/portal', [PatientController::class, 'index'])->name('portal');
        Route::get('/doctor/{id}', [PatientController::class, 'showDoctor'])->name('showDoctor');
        Route::post('/appointment/{slot}', [PatientController::class, 'makeAppointment'])->name('makeAppointment');
    });

    //Route::resource("user", UserController::class);

    Route::fallback(function () {
        return redirect('/');
    });
});

