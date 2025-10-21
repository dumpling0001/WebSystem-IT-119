<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# -----------------------
# ADMIN ROUTES
# -----------------------
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Admin Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Room routes
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
  
    // Manage teachers
    Route::get('/manage-teachers', [AdminController::class, 'manageTeachers'])->name('manage_teachers');
    Route::post('/manage_teachers/{id}/update-role', [AdminController::class, 'updateTeacherRole'])->name('manage_teachers.updateRole');
    Route::delete('/manage_teachers/{id}', [AdminController::class, 'deleteTeacher'])->name('manage_teachers.destroy');

    // ✅ Subject routes (fixed — removed double prefix)
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.list');
    Route::get('/subjects/add', [SubjectController::class, 'create'])->name('subjects.add');
    Route::post('/subjects/store', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

});

# -----------------------
# TEACHER & FACULTY DASHBOARDS
# -----------------------
Route::get('/teacher/dashboard', function () {
    return 'Teacher Dashboard';
})->middleware(['auth']);

Route::get('/faculty/dashboard', function () {
    return 'Faculty Dashboard';
})->middleware(['auth']);

require __DIR__.'/auth.php';
