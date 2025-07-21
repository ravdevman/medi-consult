<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
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
        Route::get('/appointments', [DoctorController::class, 'appointments'])->name('appointments');
        Route::post('/slot/store', [DoctorController::class, 'addSlot'])->name('addSlot');
        Route::delete('/slot/{id}/destroy', [DoctorController::class, 'destroySlot'])->name('destroySlot');
        Route::put('/appointment/{id}/update-status', [AppointmentController::class, 'updateStatus'])->name('updateStatus');
        Route::get('/report/{id}/view', [AppointmentController::class, 'report'])->name('report');
        Route::get('/report/{id}/edit', [AppointmentController::class, 'editReport'])->name('editReport');
        Route::put('/appointment/{id}/update-report', [AppointmentController::class, 'updateReport'])->name('updateReport');
        Route::post('/appointment/{id}/add-report', [AppointmentController::class, 'addReport'])->name('addReport');
    });

    Route::middleware(['patient'])->prefix('patient')->name('patient.')->group(function () {
        Route::get('/portal', [PatientController::class, 'index'])->name('portal');
        Route::get('/history', [PatientController::class, 'history'])->name('history');
        Route::get('/doctor/{id}', [PatientController::class, 'showDoctor'])->name('showDoctor');
        Route::post('/appointment/{slot}', [PatientController::class, 'makeAppointment'])->name('makeAppointment');
        Route::get('/report/{id}', [PatientController::class, 'report'])->name('report');
    });

    //Route::resource("user", UserController::class);

    Route::fallback(function () {
        return redirect('/');
    });
});

