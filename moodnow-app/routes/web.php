<?php

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

Route::get('/home', function () {
    return view('user/home');
});

Route::get('/landingpage', function () {
    return view('user/landingpage');
});

//Route::get(', [App\Http\Controllers\Admin\DashboardController::class, 'home'])->name('admin.dashboard');