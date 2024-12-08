<?php

namespace App\Http\Controllers;

use App\Models\Tuition;
use App\Models\Tutor;
use Illuminate\Http\Request;

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
            'name' => 'required',   
            'email' => 'required|email|unique:tutors',
            'phone' => 'required',
            'subjects_taught' => 'required',
            'availability_days' => 'required',
        ]);

        // Create a new tutor record
        $newTutor = Tutor::create($tutor);

        Tuition::create([
            'tutor_id' => $newTutor['id'], // Associate tutor with the tuition
        ]);
        // Redirect to the tutor list page with success message
        return redirect()->route('admin.tutors.index')->with('success', 'Tutor added successfully.');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:tutors,email,' . $id,
            'phone' => 'required',
            'subjects_taught' => 'required',
            'availability_days' => 'required',
        ]);

        // Find the tutor and update their data
        $tutor = Tutor::findOrFail($id);
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
}
    