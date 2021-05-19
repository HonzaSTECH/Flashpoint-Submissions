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

Route::get('user/{user}', [UserController::class, 'show'])->name('user.show');

Route::get('user', [UserController::class, 'index'])->name('user.index');

Route::get('register', [UserController::class, 'register'])->name('user.register');
Route::post('register', [UserController::class, 'create'])->name('user.create');

Route::get('login', [UserController::class, 'login'])->name('user.login');
Route::post('login', [UserController::class, 'auth'])->name('user.auth');

Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');

Route::delete('user/{user}/delete', [UserController::class, 'destroy'])->name('user.destroy');
