<?php

namespace App\Http\Controllers;
use App\Models\Tuition;
use App\Models\Tutor; // Import the Tutor model
use App\Models\Student; // Import the Student model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TutorNotification;

class PageController extends Controller
{
    // Display the home page
    public function home() {
        return view('home');
    }

    // Display the tutor registration page
    public function tutorRegister(){   
        return view('tutor-register');
    }

    // Display the student registration page
    public function studentRegister(){
        return view('student-register');
    }

    // Display the tutor profile page
    public function tutorProfile() {
        return view('tutor-profile');
    }

    // Display the list of tuitions with optional search functionality
    public function tuitionList(Request $request)
    {
        $query = $request->input('search'); // Get the search query from the request

        if ($query) {
            // Fetch tutors matching the search query
            $tutors = Tutor::where('name', 'LIKE', "%{$query}%")->get();
        } else {
            // Fetch all tutors if no search query is provided
            $tutors = Tutor::all();
        }

        return view('tuition-list', compact('tutors', 'query'));
    }

    // Display the messages page
    public function messages() {
        return view('messages');
    }
    
    // Display the student profile page
    public function viewProfile()
    {
        return view('student.profile', compact('student'));
    }

    // Handle tutor registration
    public function registerTutor(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tutors',
            'phone' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
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

        return redirect()->route('tuition-list');
    }

    // Handle student registration
    public function registerStudent(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required|string|max:20',
            'location' => 'nullable|string',
            'subjects_needed' => 'nullable|array',
            'learning_style' => 'nullable|string',
            'availability_days' => 'nullable|array',
            'notes' => 'nullable',
        ]);

        // Convert arrays to JSON
        $data['subjects_needed'] = json_encode($data['subjects_needed']);
        $data['availability_days'] = json_encode($data['availability_days']);

        // Create a new student record
        Student::create($data);

        // Create a new tuition record associated with the student
        return redirect()->route('tuition-list');
    }

    // Send an email to a tutor
    public function sendEmail(Request $request, Tutor $tutor)
    {
        try {
            // Send the email using Laravel's Mail facade
            Mail::to($tutor->email)->send(new TutorNotification($tutor));

            return redirect()->route('tuition-list')->with('success', 'Email sent successfully to ' . $tutor->email);
        } catch (\Exception $e) {
            \Log::error('Error sending email: ' . $e->getMessage());
            return redirect()->route('tuition-list')->with('error', 'Failed to send email to ' . $tutor->email);
        }
    }

    public function aboutUs()
    {
        return view('about');
    }
}
