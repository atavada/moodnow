<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\DetectController;
use App\Http\Controllers\User\ConsulController;

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

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/about', [AboutController::class, 'index'])->name('about');

// Auth Login Register
Auth::routes();

/*------------------------------------------
All Normal Users Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/detect', [DetectController::class, 'index'])->name('detect');
    Route::get('/consul', [ConsulController::class, 'index'])->name('consul');
});
  
/*------------------------------------------
All Admin Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
All Admin Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:operator'])->group(function () {
    Route::get('/operator/dashboard', [HomeController::class, 'operatorHome'])->name('operator.home');
});

/*------------------------------------------
All Admin Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:sobatmoodnow'])->group(function () {
    Route::get('/sobatmoodnow/dashboard', [HomeController::class, 'sobatmoodnowHome'])->name('sobatmoodnow.home');
});
// End Auth