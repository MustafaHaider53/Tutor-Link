<?php
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Tutor; // Import the Tutor mode

// Route::get('/', function () {
//     return view('welcome');
// });

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
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/tutor/register', [PageController::class, 'registerTutor'])->name('tutor.register.submit');
Route::post('/student-registration', [PageController::class, 'registerStudent'])->name('student.register.submit');





require __DIR__.'/auth.php';
