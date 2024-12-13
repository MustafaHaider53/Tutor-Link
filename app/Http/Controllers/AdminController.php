<?php

namespace App\Http\Controllers;


use App\Models\Tutor;
use Illuminate\Http\Request;
use Storage;

class AdminController extends Controller
{
    // Show the list of all tutors
    public function index()
    {
        $tutors = Tutor::all(); // Retrieve all tutors
        return view('admin.tutors.index', compact('tutors')); // Pass tutors to the view
    }

    // Show the form to create a new tutor
    public function create()
    {
        return view('admin.tutors.create'); // Show create form
    }

    // Store a new tutor in the database
    public function store(Request $request)
    {
        // Validate the input data
        $tutor = $request->validate([

            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'subjects_taught' => 'nullable',
            'availability_days' => 'nullable',

        ]);
        

        //store image

        $path = $request->file('profile_picture')->store('images', 'public');
        $fileName = basename($path);
        $tutor['profile_picture'] = $fileName;
        


        // Create a new tutor record
        Tutor::create($tutor,);

        
        // Redirect to the tutor list page with success message
        return redirect()->route('admin.tutors.index')->with('success', 'Tutor added successfully.');
    }

    public function show(string $id)
    {
        $tutor = Tutor::findOrFail($id);

        return view('admin.tutors.show',compact('tutor'));
    }

    // Show the form to edit a tutor
    public function edit($id)
    {
        $tutor = Tutor::findOrFail($id); // Find the tutor by id
        return view('admin.tutors.edit', compact('tutor')); // Pass tutor to the edit form
    }


    // Update tutor data in the database
    public function update(Request $request, $id)
    {
        // Validate the input data
        $validatedData = $request->validate([

            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'subjects_taught' => 'nullable',
            'availability_days' => 'nullable',

        ]);

        $tutor = Tutor::findOrFail($id);

        // Store the new profile picture

        if ($request->hasFile('profile_picture')) {

        if ($tutor->profile_picture && file_exists(storage_path('app/public/images/' . $tutor->profile_picture))) {
            unlink(storage_path('app/public/images/' . $tutor->profile_picture));
            $path = $request->file('profile_picture')->store('images', 'public');
            $fileName = basename($path);
            $validatedData['profile_picture'] = $fileName;
            
        }
    }


        // Find the tutor and update their data
        $tutor->update($request->all());

        // Redirect back to the tutor list with success message
        return redirect()->route('admin.tutors.index')->with('success', 'Tutor updated successfully.');
    }

    // Delete a tutor from the database
    public function destroy($id)
    {
        $tutor = Tutor::findOrFail($id);
        $tutor->delete();

        // Redirect back to the tutor list with success message
        return redirect()->route('admin.tutors.index')->with('success', 'Tutor deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $tutors = Tutor::where('name', 'LIKE', '%' . $query . '%')
        ->orWhere('email', 'LIKE', '%' . $query . '%')
        ->get();
        return view('admin.tutors.search-results', compact('tutors'));
    }
}
