<?php

use Illuminate\Support\Facades\Auth;
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

// Landing Page
Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\User\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\User\ContactController::class, 'index'])->name('contact');

// Auth Login Register
Auth::routes();
    
Route::group(['middleware' => 'role:admin|sobat-moodnow|operator|user'], function(){

    // detect
    Route::get('/detect', [App\Http\Controllers\User\DetectController::class, 'index'])->name('user.detect.index');
    Route::get('/detect/quiz', [App\Http\Controllers\User\DetectController::class, 'detectQuiz'])->name('user.detect.detectQuiz');
    Route::post('/detect/quiz/proses', [App\Http\Controllers\User\DetectController::class, 'prosesQuiz'])->name('user.detect.prosesQuiz');
    Route::get('/detect/result', [App\Http\Controllers\User\DetectController::class, 'result'])->name('user.detect.result');
    // Route::get('/detect/color', [App\Http\Controllers\User\DetectController::class, 'detectColor'])->name('user.detect.detectColor');

    // result
    Route::get('/result', [App\Http\Controllers\User\ResultController::class, 'index'])->name('user.result');

    // consul
    Route::get('/consul-user', [App\Http\Controllers\User\ConsultationController::class, 'index'])->name('user.consul');
    Route::post('/consul-user', [App\Http\Controllers\User\ConsultationController::class, 'store'])->name('user.consul.store');
});

Route::group(['middleware' => 'role:admin|sobat-moodnow|operator'], function(){

    // dashboard
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
    
    // permissions
    Route::resource('/permission', App\Http\Controllers\Admin\PermissionController::class, ['except' => ['show', 'create', 'edit', 'update', 'delete', 'publish', 'unpublish'] ,'as' => 'admin']);

    // roles
    Route::resource('/role', App\Http\Controllers\Admin\RoleController::class, ['except' => ['show'] ,'as' => 'admin']);

    // users
    Route::resource('/user', App\Http\Controllers\Admin\UserController::class, ['except' => ['show'] ,'as' => 'admin']);
    Route::get('/moodnow-user', [App\Http\Controllers\Admin\UserController::class, 'indexMoodnow'])->name('admin.userMoodnow.index');

    // quizs
    Route::resource('/quiz', App\Http\Controllers\Admin\QuestionnaireController::class, ['except' => 'show' ,'as' => 'admin']);
    
    // analysisMoods
    Route::resource('/analysisMood', App\Http\Controllers\Admin\AnalysisMoodController::class, ['except' => 'show' ,'as' => 'admin']);

    // colors
    Route::resource('/color', App\Http\Controllers\Admin\ColorController::class, ['except' => 'show' ,'as' => 'admin']);
    
    // musics
    Route::resource('/music', App\Http\Controllers\Admin\MusicController::class, ['except' => 'show' ,'as' => 'admin']);

    // consuls
    Route::resource('/consul', App\Http\Controllers\Admin\ConsulController::class, ['except' => 'show' ,'as' => 'admin']);
});