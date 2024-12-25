<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TutorApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::middleware('auth:api')->group(function() {
    Route::get('tutors', [TutorApiController::class, 'index']);
    Route::post('tutors', [TutorApiController::class, 'store']);
    Route::get('tutors/{id}', [TutorApiController::class, 'show']);
    Route::put('tutors/{id}', [TutorApiController::class, 'update']);
    Route::delete('tutors/{id}', [TutorApiController::class, 'destroy']);
});
