<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TutorApiController;
use App\Http\Controllers\Api\AuthController;





// Public route for sign up
Route::post('/signup', [AuthController::class, 'signup']);

// Public route for login
Route::post('/login', [AuthController::class, 'login']);

// Public route for logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');




 // Logout route (revoke the access token)
 
Route::middleware('auth:sanctum')->name('tutor.')->prefix('tutor')->group(function() {
    Route::get('/', [TutorApiController::class, 'index'])->name('index');
    Route::post('store', [TutorApiController::class, 'store'])->name('store');
    Route::get('{id}', [TutorApiController::class, 'show'])->name('show');
    Route::put('update/{id}', [TutorApiController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [TutorApiController::class, 'destroy'])->name('destroy');
});


