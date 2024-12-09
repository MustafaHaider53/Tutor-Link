<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RelationShipController;
use App\Http\Controllers\StudentTutorController;
use App\Http\Controllers\TuitionController;
use App\Http\Middleware\ValidAdmin;
use Illuminate\Support\Facades\Route;


Route::get('/welcome', function () {
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


Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/tutor-register', [PageController::class, 'tutorRegister'])->name('tutor-register');
Route::get('/student-register', [PageController::class, 'studentRegister'])->name('student-register');
Route::get('/tutor-profile', [PageController::class, 'tutorProfile'])->name('tutor-profile');
Route::get('/tuition-list', [PageController::class, 'tuitionList'])->name('tuition-list');
Route::get('/messages', [PageController::class, 'messages'])->name('messages');
Route::post('/tutor/register', [PageController::class, 'registerTutor'])->name('tutor.register.submit');
Route::post('/student-registration', [PageController::class, 'registerStudent'])->name('student.register.submit');

// Admin Panel Routes
Route::prefix('admin')->middleware(ValidAdmin::class)->group(function () {
    // Show the tutor management page (view all tutors)
    Route::get('/tutors', [AdminController::class, 'index'])->name('admin.tutors.index');

    // Show the form to add a new tutor
    Route::get('/tutors/create', [AdminController::class, 'create'])->name('admin.tutors.create');
    
    // Store the new tutor data in the database
    Route::post('/tutors', [AdminController::class, 'store'])->name('admin.tutors.store');

    // Show the form to edit a tutor
    Route::get('/tutors/{id}/edit', [AdminController::class, 'edit'])->name('admin.tutors.edit');
    
    // Update the tutor data in the database
    Route::put('/tutors/{id}', [AdminController::class, 'update'])->name('admin.tutors.update');
    
    // Delete the tutor from the database
    Route::delete('/tutors/{id}', [AdminController::class, 'destroy'])->name('admin.tutors.destroy');
    
    Route::resource('relationship',RelationShipController::class);
}); 




require __DIR__.'/auth.php';
