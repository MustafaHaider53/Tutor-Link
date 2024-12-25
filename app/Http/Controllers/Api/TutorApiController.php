<?php

namespace App\Http\Controllers\Api;

use App\Services\TutorService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TutorApiController extends Controller
{
    protected $tutorService;

    // Constructor to inject the TutorService
    public function __construct(TutorService $tutorService)
    {
        $this->tutorService = $tutorService;
    }

    // To get all tutors
    public function index()
    {
        $tutors = $this->tutorService->getAllTutors();
        return response()->json($tutors);
    }

    // To store a new tutor
    public function store(Request $request)
    {
        $response = $this->tutorService->createTutor($request);
        return response()->json($response);
    }

    // To get a single tutor's data
    public function show($id)
    {
        $tutor = $this->tutorService->getTutorById($id);
        return response()->json($tutor);
    }

    // To update tutor's data
    public function update(Request $request, $id)
    {
        $response = $this->tutorService->updateTutor($request, $id);
        return response()->json($response);
    }

    // To delete a tutor
    public function destroy($id)
    {
        $response = $this->tutorService->deleteTutor($id);
        return response()->json($response);
    }
}
