<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Route;

// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('my-blogs', [BlogController::class, 'index'])->name('index');
    Route::get('create', [BlogController::class, 'create'])->name('create');
    Route::post('store', [BlogController::class, 'store'])->name('store');
    Route::get('show/{id}', [BlogController::class, 'show'])->name('show');
    Route::get('edit/{id}', [BlogController::class, 'edit'])->name('edit');
    Route::post('update/{id}', [BlogController::class, 'update'])->name('update');
    Route::post('destroy/{id}', [BlogController::class, 'destroy'])->name('destroy');
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
