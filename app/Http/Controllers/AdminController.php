<?php

namespace App\Http\Controllers;

use App\Services\TutorService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $tutorService;

    public function __construct(TutorService $tutorService)
    {
        $this->tutorService = $tutorService;
    }

    public function index()
    {
        $tutors = $this->tutorService->getAllTutors();
        return view('admin.tutors.index', compact('tutors'));
    }

    public function create()
    {
        return view('admin.tutors.create');
    }

    public function store(Request $request)
    {
        $response = $this->tutorService->createTutor($request);
        return redirect()->route('admin.tutors.index')->with($response['success'] ? 'success' : 'error', $response['message']);
    }

    public function show($id)
    {
        $tutor = $this->tutorService->getTutorById($id);
        return view('admin.tutors.show', compact('tutor'));
    }

    public function edit($id)
    {
        $tutor = $this->tutorService->getTutorById($id);
        return view('admin.tutors.edit', compact('tutor'));
    }

    public function update(Request $request, $id)
    {
        $response = $this->tutorService->updateTutor($request, $id);
        return redirect()->route('admin.tutors.index')->with($response['success'] ? 'success' : 'error', $response['message']);
    }

    public function destroy($id)
    {
        $response = $this->tutorService->deleteTutor($id);
        return redirect()->route('admin.tutors.index')->with($response['success'] ? 'success' : 'error', $response['message']);
    }

    public function search(Request $request)
    {
        $tutors = $this->tutorService->searchTutors($request->get('query'));
        return view('admin.tutors.search-results', compact('tutors'));
    }
}
