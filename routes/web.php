<?php

use App\Http\Controllers\AdminDashboard;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\StudentCourseController;
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

    // In routes/web.php

// Route to view all assignments for the logged-in instructor
    Route::get('/admin/courses/assignments', [AssignmentController::class, 'viewAssignments'])
        ->name('admin.assignments.view')
        ->middleware('auth'); // Ensure the user is authenticated



});

//courses
Route::get('/courses/{id}', [DashboardController::class, 'show'])->name('courses.details');

//admin course

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
//Route::get('/courses/add', [CourseController::class, 'create'])->name('addCourse');
Route::get('/admin/courses/add', [CourseController::class, 'create'])->name('course.create');

Route::post('/courses/store', [CourseController::class, 'store'])->name('courses.store');
Route::get('/courses/edit/{id}', [CourseController::class, 'edit'])->name('courses.edit');
Route::post('/courses/update/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::get('/courses/delete/{id}', [CourseController::class, 'delete'])->name('courses.delete');

//student to courses
Route::get('/student-courses', [StudentCourseController::class, 'index'])->name('student.courses');
Route::delete('/student-course/{id}', [StudentCourseController::class, 'destroy'])->name('student.course.delete');
Route::get('/add-student-course', [StudentCourseController::class, 'create'])->name('addStudentCourse');
Route::post('/add-student-course', [StudentCourseController::class, 'store'])->name('storeStudentCourse');
