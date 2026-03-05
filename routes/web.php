<?php

<<<<<<< HEAD
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [EventController::class , 'index'])->name('home');
Route::get('/events/{event}', [EventController::class , 'show'])->name('events.show');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::post('/registrations', [RegistrationController::class , 'store'])->name('registrations.store');
    Route::delete('/registrations/{registration}', [RegistrationController::class , 'destroy'])->name('registrations.destroy');
});

require __DIR__ . '/settings.php';
=======
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
>>>>>>> 1df37db256d9068ed25ea4a04075fa430c840c6b
