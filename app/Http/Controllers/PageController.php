<?php

namespace App\Http\Controllers;
use App\Models\Tutor; // Import the Tutor model
use App\Models\Student; // Import the Tutor model
use Illuminate\Http\Request;



class PageController extends Controller
{
    public function home() {
        return view('home');
    }

    public function tutorRegister(){   
        return view('tutor-register');
    }

    public function studentRegister(){
        return view('student-register');
    }

    public function tutorProfile() {
        return view('tutor-profile');
    }

    public function tuitionList()
    {
        $tutors = Tutor::all(); // Fetch all tutors
        return view('tuition-list', compact('tutors'));
    
    }


    public function messages() {
        return view('messages');
    }
    

    public function viewProfile()
    {
 
    return view('student.profile', compact('student'));
    }


public function registerTutor(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:tutors',
        'phone' => 'required|string|max:15',
        'subjects_taught' => 'nullable|array',
        'availability_days' => 'nullable|array',
        'hourly_rate' => 'required|numeric|min:0',
        'notes' => 'nullable|string',
    ]);

    // Create a new tutor record
    Tutor::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'phone' => $validatedData['phone'],
        'subjects_taught' => json_encode($validatedData['subjects_taught']),
        'availability_days' => json_encode($validatedData['availability_days']),
        'hourly_rate' => $validatedData['hourly_rate']
    ]);

    // Redirect or return a view after successful registration
    return "<h1>Tutor Register Successfully!</h1>
            <h2>You are now in our Tuition Listing page! </h2>
            <a href='http://localhost:8000/tuition-list'>Tuition Listing</a>";
}

public function registerStudent(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:students',
        'phone' => 'required|string|max:20',
        'subjects_needed' => 'nullable|array',
        'availability_days' => 'nullable|array',
        'notes' => 'nullable',
    ]);

     // Convert arrays to JSON
     $data['subjects_needed'] = json_encode($data['subjects_needed']);
     $data['availability_days'] = json_encode($data['availability_days']);
 

    Student::create($data);

    return "<h1>Studen Register sucessgully</h1>";
}




}
