<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LoadController;
use App\Http\Controllers\TeacherController;


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
    Route::post('/manage-teachers/{id}/update-role', [AdminController::class, 'updateTeacherRole'])->name('manage_teachers.updateRole');
    Route::post('/manage-teachers/{id}/update-department', [AdminController::class, 'updateTeacherDepartment'])->name('manage_teachers.updateDepartment');
    Route::post('/manage-teachers/{id}/update-specialization', [AdminController::class, 'updateTeacherSpecialization'])->name('manage_teachers.updateSpecialization');
    Route::delete('/manage-teachers/{id}', [AdminController::class, 'deleteTeacher'])->name('manage_teachers.destroy');
    
    // Manage Loads
    Route::get('/loads', [LoadController::class, 'index'])->name('loads.index');
    Route::post('/loads/store', [LoadController::class, 'store'])->name('loads.store');
    Route::delete('/loads/{id}', [LoadController::class, 'destroy'])->name('loads.destroy');
  
    Route::get('/teacher-subjects', [LoadController::class, 'getSubjects'])->name('getSubjects');

    // Subject 
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.list');
    Route::get('/subjects/add', [SubjectController::class, 'create'])->name('subjects.add');
    Route::post('/subjects/store', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/subjects/{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/subjects/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

});

    


# TEACHER DASHBOARDS
Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');

    Route::get('/teacher/schedule/download', [TeacherController::class, 'downloadSchedule'])->name('teacher.schedule.download');


});








Route::get('/faculty/dashboard', function () {
    return 'Faculty Dashboard';
})->middleware(['auth']);

require __DIR__.'/auth.php';
