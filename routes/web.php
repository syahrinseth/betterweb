<?php

use Inertia\Inertia;
use App\Models\Course;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CourseResource;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PurchaseCourseController;
use App\Http\Controllers\MagicLinkLogin\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain('kelas.' . env('APP_URL'))->group(function() {
    Route::get('/', function() {
        abort(404);
    })->middleware([]);
});

Route::domain(env('APP_URL'))->group(function() {

    Route::controller(HomeController::class)
        ->group(function() {
            Route::get('/', 'index')->name('/');
        });
    
    Route::controller(ServiceController::class)
        ->prefix('/perkhidmatan')
        ->name('service.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
        });
    
    Route::controller(CourseController::class)
        ->prefix('/kursus-video')
        ->name('course.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/{slug}', 'show')->name('show');
        });
    
    Route::controller(LessonController::class)
        ->prefix('/kursus-video/{slug}/pelajaran')
        ->name('course.lesson.')
        ->group(function() {
            Route::get('/{id}', 'show')->name('show');
        });
    
    Route::controller(PurchaseCourseController::class)
        ->prefix('/kursus-video/{slug}/purchase')
        ->name('course.purchase.')
        ->group(function() {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
        });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')
    ->controller(AuthController::class)
    ->group(function() {
        Route::get('login', 'create')->name('login');
        Route::get('register', 'create')->name('register');
        Route::post('login', 'store')->name('login.store');
        Route::get('verify-login/{token}', 'verifyLogin')->name('login.verifyLogin');
    });

Route::middleware('auth')
    ->controller(AuthController::class)
    ->group(function() {
        Route::post('logout', 'logout')->name('logout');
    });
