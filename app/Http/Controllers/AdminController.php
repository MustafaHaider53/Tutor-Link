<?php

namespace App\Http\Controllers;

use App\Services\TutorService;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    protected $tutorService;

    // Constructor to inject the TutorService dependency
    public function __construct(TutorService $tutorService)
    {
        $this->tutorService = $tutorService;
    }

    // Display a listing of the tutors
    public function index()
    {
        $tutors = $this->tutorService->getAllTutors();
        return view('admin.tutors.index', compact('tutors'));
    }

    // Show the form for creating a new tutor
    public function create()
    {
        return view('admin.tutors.create');
    }

    // Store a newly created tutor in storage
    public function store(Request $request)
    {
        $response = $this->tutorService->createTutor($request);
        return redirect()->route('admin.tutors.index')->with($response['success'] ? 'success' : 'error', $response['message']);
    }

    // Display the specified tutor
    public function show($id)
    {
        $tutor = $this->tutorService->getTutorById($id);
        return view('admin.tutors.show', compact('tutor'));
    }

    // Show the form for editing the specified tutor
    public function edit($id)
    {
        $tutor = $this->tutorService->getTutorById($id);
        return view('admin.tutors.edit', compact('tutor'));
    }

    // Update the specified tutor in storage
    public function update(Request $request, $id)
    {
        $response = $this->tutorService->updateTutor($request, $id);
        return redirect()->route('admin.tutors.index')->with($response['success'] ? 'success' : 'error', $response['message']);
    }

    // Remove the specified tutor from storage
    public function destroy($id)
    {
        $response = $this->tutorService->deleteTutor($id);
        return redirect()->route('admin.tutors.index')->with($response['success'] ? 'success' : 'error', $response['message']);
    }

    // Search for tutors based on a query
    public function search(Request $request)
    {
        $tutors = $this->tutorService->searchTutors($request->get('query'));
        return view('admin.tutors.search-results', compact('tutors'));
    }
}
