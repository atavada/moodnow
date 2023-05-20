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
Route::get('/contact-us', [App\Http\Controllers\User\ContactController::class, 'index'])->name('user.contact.index');
Route::post('/contact-us/proses', [App\Http\Controllers\User\ContactController::class, 'store'])->name('user.contact.store');

// Auth Login Register
Auth::routes();
    
Route::group(['middleware' => 'role:admin|sobat-moodnow|operator|user'], function(){

    // detect
    Route::get('/detect', [App\Http\Controllers\User\DetectController::class, 'index'])->name('user.detect.index');
    
    // detect quiz
    Route::get('/detect/your-mood', [App\Http\Controllers\User\DetectController::class, 'detectMood'])->name('user.detect.detectMood');
    Route::post('/detect/your-mood/proses', [App\Http\Controllers\User\DetectController::class, 'prosesDetect'])->name('user.detect.prosesDetect');
    
    // detect result
    Route::get('/detect/result', [App\Http\Controllers\User\DetectController::class, 'result'])->name('user.detect.result');

    // result
    Route::get('/result', [App\Http\Controllers\User\ResultController::class, 'index'])->name('user.result');
    Route::delete('/result/delete/{id}', [App\Http\Controllers\User\ResultController::class, 'destroy'])->name('user.result.destroy');

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

    // contact
    Route::resource('/contact', App\Http\Controllers\Admin\ContactController::class, ['except' => 'show' ,'as' => 'admin']);

    // consuls
    Route::resource('/consul', App\Http\Controllers\Admin\ConsulController::class, ['except' => 'show' ,'as' => 'admin']);
});