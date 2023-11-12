<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\CurriculumController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\OfficeHourController;
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
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

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

    // Curriculum
    Route::controller(CurriculumController::class)->group(function () {
        Route::get('/curriculum', 'index')->name('curriculum.index');
        Route::get('/curriculum/edit', 'edit')->name('curriculum.edit');
        Route::post('/curriculum/update/{curriculum?}', 'update')->name('curriculum.update');
    });

    // Course
    Route::controller(CourseController::class)->group(function () {
        Route::get('/course', 'index')->name('course.index');
        Route::get('/course/edit', 'edit')->name('course.edit');
        Route::post('/course/update/{course?}', 'update')->name('course.update');
    });

    // Education
    Route::controller(EducationController::class)->group(function () {
        Route::get('/education', 'index')->name('education.index');
        Route::get('/education/edit', 'edit')->name('education.edit');
        Route::post('/education/update/{education?}', 'update')->name('education.update');
    });

    // Location
    Route::controller(LocationController::class)->group(function () {
        Route::get('/locations', 'index')->name('location.index');
        Route::get('/locations/create', 'create')->name('location.create');
        Route::post('/locations/store', 'store')->name('location.store');
        Route::get('/locations/{location}/edit', 'edit')->name('location.edit');
        Route::post('/locations/{location}/update', 'update')->name('location.update');
        Route::get('/locations/{location}/delete', 'destroy')->name('location.destroy');
    });

    // Office hours
    Route::controller(OfficeHourController::class)->group(function () {
        Route::get('/office-hours', 'index')->name('officeHour.index');
        Route::get('/office-hours/create', 'create')->name('officeHour.create');
        Route::post('/office-hours/store', 'store')->name('officeHour.store');
        Route::get('/office-hours/{officeHour}/edit', 'edit')->name('officeHour.edit');
        Route::post('/office-hours/{officeHour}/update', 'update')->name('officeHour.update');
        Route::get('/office-hours/{officeHour}/delete', 'destroy')->name('officeHour.destroy');
    });
});
