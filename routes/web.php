<?php

use App\Http\Controllers\web\HomeController;
use Illuminate\Support\Facades\Artisan;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('root');
    Route::get('/about', 'about')->name('about');
    Route::get('/teaching-philosophy', 'teaching')->name('teaching');
    Route::get('/curriculum-vitae', 'curriculum')->name('curriculum');
    Route::get('/courses', 'course')->name('course');
});

Route::get('/storage-link', function(){
    Artisan::call('storage:link');
});
