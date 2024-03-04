<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('user.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('user.logout');


Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/create', [UserController::class, 'save'])->name('user.save');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

Route::get('{user}/view', [UserController::class, 'view'])->name('user.view');
Route::get('{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('{user}/update', [UserController::class, 'update'])->name('user.update');
// Route::post('upadate_user',[UserController::class, 'update'])->name('user.update');
Route::delete('{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');












