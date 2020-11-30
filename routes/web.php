<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('login', [\App\Http\Controllers\AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('auth.login');

Route::middleware(['auth', 'checkActiveAccount'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
    });
});
