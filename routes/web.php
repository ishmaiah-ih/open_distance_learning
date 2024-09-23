<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->get('/homepage', [DashboardController::class, 'index'])->name('user.dashboard');


Route::get('/admin', [AdminDashboard::class, 'index'])->name('admin.index');
Route::get('/admin/students', [AdminDashboard::class, 'students'])->name('students_all');
Route::get('/admin/students/add', [AdminDashboard::class, 'add_students'])->name('student.add');
Route::post('/admin/students/add', [AdminDashboard::class, 'store'])->name('user.store');
Route::delete('/students/{id}', [AdminDashboard::class, 'destroy'])->name('student.delete');


//resources

Route::get('/resources/get', [ResourceController::class, 'resources'])->name('resources.all');
Route::get('/resources/upload', [ResourceController::class, 'resourcesAdd'])->name('resources.get');
Route::post('resources', [ResourceController::class, 'store'])->name('resources.store');
Route::get('/resources/{id}', [ResourceController::class, 'edit'])->name('resources.edit');
Route::delete('/resources/{id}', [ResourceController::class, 'destroy'])->name('resources.delete');

Route::middleware('auth')->group(function () {
    Route::get('/courses/{courseId}/assignments', [AssignmentController::class, 'show'])->name('assignments.show');
    Route::post('/courses/{course}/assignments/upload', [AssignmentController::class, 'uploadAssignment'])->name('assignments.upload');

    Route::post('/courses/{courseId}/assignments/upload', [AssignmentController::class, 'upload'])->name('assignments.upload');
});

//courses
Route::get('/courses/{id}', [DashboardController::class, 'show'])->name('courses.details');

Route::get('/courses/resources', [AdminDashboard::class, 'showResources'])->name('courses');
Route::delete('/courses/{id}', [DashboardController::class, 'destroy'])->name('courses.delete');
