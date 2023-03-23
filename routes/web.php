<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth', 'verified')->name('dashboard');

Route::middleware('auth' ,'can:activado')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/movimientos', [MovimientoController::class, 'index'])->name('movimientos.index');


    /* Admin */
    Route::middleware('can:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/user', [AdminController::class, 'indexUser'])->name('admin.user');
        Route::get('/admin/admin', [AdminController::class, 'indexAdmin'])->name('admin.admin');

        Route::put('/admin/{user}/user', [AdminController::class, 'updateUser'])->name('admin.update.user');
        Route::put('/admin/{user}/admin', [AdminController::class, 'updateAdmin'])->name('admin.update.admin');
        //Route::post('/movimientos', [MovimientoController::class, 'store'])->name('movimientos.store');

      Route::resource('/movimientos', MovimientoController::class)->only(['store']);
    });
});




require __DIR__ . '/auth.php';
