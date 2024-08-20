<?php

use App\Http\Controllers\AuthController\ChangePasswordController;
use App\Http\Controllers\DashboardController\DashboardController;
use App\Http\Controllers\AuthController\LoginController;
use App\Http\Controllers\EmployeeBirthday\EmployeeBirthday;
use App\Http\Controllers\NewEmployeController\NewEmployeController;
use App\Http\Controllers\ProfileController\ProfileController;
use Illuminate\Support\Facades\Route;

// Rute tanpa middleware auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('loginauth');

// Rute yang memerlukan middleware auth
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/profiles', [ProfileController::class, 'index'])->name('profile');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change-password');
    Route::post('/change-profile', [ProfileController::class, 'changeProfile'])->name('change-profile');
    Route::post('/change-password', [ChangePasswordController::class, 'updatePassword'])->name('change-password');

    Route::get('/new-employe', [NewEmployeController::class, 'index'])->name('new-employe');
    Route::get('/new-employe-export', [NewEmployeController::class, 'exportExcelNewEmployee'])->name('new-employe-export');
    Route::post('/sendmail-new-employee', [NewEmployeController::class, 'sendMailNewEmploye'])->name('sendmail-new-employee');

    Route::get('/employee_birthday', [EmployeeBirthday::class, 'index'])->name('employee_birthday');
    Route::post('/sendmail-employee-birthday', [EmployeeBirthday::class, 'sendMailEmployeeBirthday'])->name('sendmail-employee-birthday');
});
