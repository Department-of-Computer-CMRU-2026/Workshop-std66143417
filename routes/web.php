<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [EventController::class , 'index'])->name('home');
Route::get('/events/{event}', [EventController::class , 'show'])->name('events.show');

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::post('/registrations', [RegistrationController::class , 'store'])->name('registrations.store');
    Route::delete('/registrations/{registration}', [RegistrationController::class , 'destroy'])->name('registrations.destroy');

    // Admin routes
    Route::prefix('admin')->name('admin.')->middleware('can:admin')->group(function () {
            Route::resource('events', \App\Http\Controllers\Admin\EventController::class);
        }
        );    });

require __DIR__ . '/settings.php';