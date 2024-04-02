<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
        Route::get('tool/qr/{id}', [ToolController::class, 'qrcode'])->name('tool.qr');
        //Authenticated routes
        Route::get('link/search', [LinkController::class, 'searchForm'])->name('link.search.form');
        Route::post('link/search', [LinkController::class, 'search'])->name('link.search');
        Route::resource('link', LinkController::class)->except(['edit', 'destroy']);
        //Admin middleware group
        Route::prefix('admin')->group(function () {
            Route::middleware('super_admin')->group(function () {
                Route::put('employee/enable/{id}', [EmployeeController::class, 'enable'])->name('employee.enable');
                Route::resource('profile', ProfileController::class);
                Route::get('register', [RegisteredUserController::class, 'create'])
                    ->name('register');
                Route::post('register', [RegisteredUserController::class, 'store']);
            });
            Route::middleware('is_admin')->group(function () {
                Route::resource('employee', EmployeeController::class)->except(['show']);
                Route::resource('tool', ToolController::class)->except(['show']);
            });
        });
    });
});
