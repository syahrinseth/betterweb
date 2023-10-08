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

Route::get('/', function () {
    $courses = Course::with(['author', 'tags'])
        ->paginate(4);

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'courses' => CourseResource::collection($courses)
    ]);
})->middleware(['guest'])->name('/');

Route::controller(CourseController::class)->prefix('/kursus-video')->group(function() {
    Route::get('/', 'index')->name('videoCourse.index');
    Route::get('/{slug}', 'show')->name('videoCourse.show');
});

Route::controller(LessonController::class)->prefix('/kursus-video/{slug}/pelajaran')->group(function() {
    Route::get('/{id}', 'show')->name('lesson.show');
    Route::get('/{id}/beli-kursus-video', 'showBuyVideoCourse')->name('lesson.showBuyVideoCourse');
});

Route::get('/dashboard', function () {
    $courses = Course::with(['author', 'tags'])
        ->paginate(4);

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'courses' => CourseResource::collection($courses)
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('guest')->controller(AuthController::class)->group(function() {
    Route::get('login', 'create')->name('login');
    Route::get('register', 'create')->name('register');
    Route::post('login', 'store')->name('login.store');
    Route::get('verify-login/{token}', 'verifyLogin')->name('login.verifyLogin');
});

Route::middleware('auth')->controller(AuthController::class)->group(function() {
    Route::post('logout', 'logout')->name('logout');
});
