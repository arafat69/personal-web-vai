<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\TeachingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'login')->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Home
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->name('home.index');
        Route::get('/home/edit', 'edit')->name('home.edit');
        Route::post('/home/update/{home?}', 'update')->name('home.update');
    });

    // About
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about', 'index')->name('about.index');
        Route::get('/about/edit', 'edit')->name('about.edit');
        Route::post('/about/update/{about?}', 'update')->name('about.update');
    });

    // Teaching
    Route::controller(TeachingController::class)->group(function () {
        Route::get('/teaching', 'index')->name('teaching.index');
        Route::get('/teaching/edit', 'edit')->name('teaching.edit');
        Route::post('/teaching/update/{teaching?}', 'update')->name('teaching.update');
    });
});
