<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FormDataController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    //System initial route
    Route::get('/', function () {
        return to_route('link.index');
    });

    //Application prefix group 
    Route::prefix("tools")->group(function () {

        //Authenticated routes
        Route::prefix('link')->group(function () {
            Route::get('/', [LinkController::class, 'index'])->name('link.index');
        });
        //Admin middleware group
        Route::middleware('is_admin')->group(function () {
            Route::prefix('admin')->group(function () {
                Route::resource('employee', EmployeeController::class);
                Route::resource('tool', ToolController::class);
                Route::resource('profile', ProfileController::class);
                Route::get('register', [RegisteredUserController::class, 'create'])
                    ->name('register');
                Route::post('register', [RegisteredUserController::class, 'store']);
                Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                    ->name('password.reset');
                Route::post('reset-password', [NewPasswordController::class, 'store'])
                    ->name('password.store');
            });
        });
    });
});
