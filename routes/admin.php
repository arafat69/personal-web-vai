<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\CurriculumController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\EducationController;
use App\Http\Controllers\admin\HeaderController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\LocationController;
use App\Http\Controllers\admin\OfficeHourController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\SectionController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SocialLinkController;
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

    // Section
    Route::controller(SectionController::class)->group(function () {
        Route::get('/left-section', 'index')->name('section.index');
        Route::get('/left-section/profile/{section?}', 'profile')->name('section.profile');
        Route::post('/left-section/profile/{section?}', 'profileUpdate')->name('section.profile.update');
        Route::get('/left-section/create', 'create')->name('section.create');
        Route::post('/left-section/store', 'store')->name('section.store');
        Route::get('/left-section/{section}/edit', 'edit')->name('section.edit');
        Route::post('/left-section/{section}/update', 'update')->name('section.update');
        Route::get('/left-section/{section}/delete', 'destroy')->name('section.destroy');
    });

    // Header
    Route::controller(HeaderController::class)->group(function () {
        Route::get('/header', 'index')->name('header.index');
        Route::get('/header/edit', 'edit')->name('header.edit');
        Route::post('/header/update/{header?}', 'update')->name('header.update');
    });

    // Social Link
    Route::controller(SocialLinkController::class)->group(function () {
        Route::get('/socials', 'index')->name('social.index');
        Route::get('/socials/create', 'create')->name('social.create');
        Route::post('/socials/store', 'store')->name('social.store');
        Route::get('/socials/{social}/edit', 'edit')->name('social.edit');
        Route::post('/socials/{social}/update', 'update')->name('social.update');
        Route::get('/socials/{social}/delete', 'destroy')->name('social.destroy');
    });

    // Setting
    Route::controller(SettingController::class)->group(function () {
        Route::get('/setting', 'index')->name('setting.index');
        Route::get('/setting/edit', 'edit')->name('setting.edit');
        Route::post('/setting/update/{setting?}', 'update')->name('setting.update');
    });

    // Profile
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index')->name('profile.index');
        Route::post('/profile/update', 'update')->name('profile.update');
        Route::get('/change-password', 'show')->name('change.password');
        Route::post('/change-password', 'changePassword')->name('change.password');
    });
});
