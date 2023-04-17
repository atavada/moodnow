<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MusicController;
use App\Http\Controllers\Admin\QuestionnaireController;
use App\Http\Controllers\Admin\ColorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\User\AboutController;
use App\Http\Controllers\User\DetectController;
use App\Http\Controllers\User\ConsulController;
use App\Http\Controllers\User\ContactController;

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

// Landing Page
Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/about', [AboutController::class, 'index'])->name('about');
    
Route::get('/contact', [ContactController::class, 'index'])->name('contact');

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
    // Route::get('/admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    // Quiz
    Route::resource('/quiz', QuestionnaireController::class, ['names' => [
        'index' => 'admin.quiz.index',
        'create' => 'admin.quiz.create',
        'store' => 'admin.quiz.store',
        'edit' => 'admin.quiz.edit',
        'update' => 'admin.quiz.update',
        'destroy' => 'admin.quiz.destroy'
    ]]);

     // Color
     Route::resource('/colors', ColorController::class, ['names' => [
        'index' => 'admin.color.index',
        'create' => 'admin.color.create',
        'store' => 'admin.color.store',
        'edit' => 'admin.color.edit',
        'update' => 'admin.color.update',
        'destroy' => 'admin.color.destroy'
    ]]);


    // User
    Route::resource('/users', UserController::class, ['names' => [
        'index' => 'admin.user.index',
        'create' => 'admin.user.create',
        'store' => 'admin.user.store',
        'edit' => 'admin.user.edit',
        'update' => 'admin.user.update',
        'destroy' => 'admin.user.destroy'
    ]]);
    Route::get('/moodnow-user', [UserController::class, 'indexMoodnow'])->name('admin.userMoodnow.index');

    // Route::get('/moodnow-music', [MusicController::class, 'index'])->name('admin.music.index');
    Route::resource('moodnow-music', MusicController::class, ['names' => [
        'index' => 'admin.music.index',
        'create' => 'admin.music.create',
        'store' => 'admin.music.store',
        'edit' => 'admin.music.edit',
        'update' => 'admin.music.update',
        'destroy' => 'admin.music.destroy'
    ]]);
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