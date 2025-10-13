<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoomController;


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

#admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Room routes
    Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/admin/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
    Route::get('/admin/rooms/{room}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::delete('/admin/rooms/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');
  
    Route::get('/admin/manage-teachers', [AdminController::class, 'manageTeachers'])->name('admin.manage_teachers');
    Route::post('/admin/manage_teachers/{id}/update-role', [AdminController::class, 'updateTeacherRole'])->name('admin.manage_teachers.updateRole');
    Route::delete('/admin/manage_teachers/{id}', [AdminController::class, 'deleteTeacher'])->name('admin.manage_teachers.destroy');

});


Route::get('/teacher/dashboard', function () {
    return 'Teacher Dashboard';
})->middleware(['auth']);

Route::get('/faculty/dashboard', function () {
    return 'Faculty Dashboard';
})->middleware(['auth']);


require __DIR__.'/auth.php';
