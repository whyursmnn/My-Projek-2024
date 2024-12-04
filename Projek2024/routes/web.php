<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\CourseMaterialController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\teacher\TeacherCoursesController;
use App\Http\Controllers\teacher\TeacherCoutentController;
use App\Http\Controllers\teacher\TeacherDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Student\StudentProgressController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/search-courses', [WelcomeController::class, 'searchCourses']);

// Dashboard umum
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Profil pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute untuk Admin
Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/AdminDashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('contents', ContentController::class);
});

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


// Rute untuk Teacher
Route::prefix('teacher')->name('teacher.')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/TeacherDashboard', [TeacherDashboardController::class, 'index'])->name('dashboard');

    // Courses
    Route::resource('courses', TeacherCoursesController::class);
    Route::resource('contents', TeacherCoutentController::class);

    // Student Management
    Route::get('courses/{course}/students', [TeacherCoursesController::class, 'showStudents'])->name('courses.student');
    Route::get('courses/{course}/students/{student}/progress', [TeacherCoursesController::class, 'showStudentProgress'])->name('courses.student.progress');

    // Progress Management
    Route::get('courses/{course}/progress', [TeacherCoursesController::class, 'showCourseProgress'])->name('teacher.courses.progress');
    Route::get('courses/progress', [TeacherCoursesController::class, 'indexProgress'])->name('teacher.courses.progress');
});


Route::prefix('student')->name('student.')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard untuk student
    Route::get('dashboard', [StudentCourseController::class, 'dashboard'])->name('dashboard');

    // Daftar kursus yang tersedia
    Route::get('courses', [StudentCourseController::class, 'index'])->name('courses.index');
    Route::get('courses/{course}', [StudentCourseController::class, 'show'])->name('courses.show');

    // Mendaftar ke kursus
    Route::post('courses/enroll/{courseId}', [StudentCourseController::class, 'enroll'])->name('courses.enroll');

    // Progress routes
    Route::get('progress', [StudentProgressController::class, 'index'])->name('progress.index');
    Route::get('progress/{course}', [StudentProgressController::class, 'show'])->name('progress.show');
    Route::put('progress/{course}', [StudentProgressController::class, 'update'])->name('progress.update');

});




// Admin dan Teacher dapat mengelola materi kursus
Route::middleware(['auth', 'verified', 'admin_or_teacher'])->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('courses/{course}/materials/create', [CourseMaterialController::class, 'create'])
            ->name('courses.materials.create');
        Route::post('courses/{course}/materials', [CourseMaterialController::class, 'store'])
            ->name('courses.materials.store');
    });

    Route::prefix('teacher')->name('teacher.')->group(function () {
        Route::get('courses/{course}/materials/create', [CourseMaterialController::class, 'create'])
            ->name('courses.materials.create');
        Route::post('courses/{course}/materials', [CourseMaterialController::class, 'store'])
            ->name('courses.materials.store');
    });


    Route::middleware(['auth'])->group(function() {
        Route::put('progress/{courseId}', [ProgressController::class, 'update'])->name('student.progress.update');
    });

});









// Rute autentikasi
require __DIR__ . '/auth.php';
