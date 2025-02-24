<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('super_admin')
    ->name('super_admin.')
    ->middleware(['auth', 'verified', 'role:super_admin'])
    ->group(function () {
        Route::get('index', [SuperAdminController::class, 'index'])->name('index');
    });

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified', 'role:super_admin|admin'])
    ->group(function () {
        Route::get('index', [AdminController::class, 'index'])->name('index');
    });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
