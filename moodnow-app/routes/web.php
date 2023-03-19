<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

// Auth Login Register
Auth::routes();
  
/*------------------------------------------
All Normal Users Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
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
    Route::get('/operator/home', [HomeController::class, 'operatorHome'])->name('operator.home');
});

/*------------------------------------------
All Admin Routes List
--------------------------------------------*/
Route::middleware(['auth', 'user-access:sobatmoodnow'])->group(function () {
    Route::get('/sobatmoodnow/home', [HomeController::class, 'sobatmoodnowHome'])->name('sobatmoodnow.home');
});
// End Auth