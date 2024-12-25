<?php

namespace App\Http\Controllers;

use App\Models\Tuition;
use App\Models\Tutor;
use App\Models\Student;
use Illuminate\Http\Request;
use Log;

class RelationShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all tuitions with their associated tutor and student
        $tuitions = Tuition::with('tutor','student')->get();

        return view('relationship.index', compact('tuitions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Fetch all tutors and students
        $tutors = Tutor::all();
        $students = Student::all();

        foreach ($students as $student) {
            foreach ($tutors as $tutor) {
                // Decode JSON fields
                $studentSubjects = json_decode($student->subjects_needed, true);
                $studentAvailability = json_decode($student->availability_days, true);
                $tutorSubjects = json_decode($tutor->subjects_taught, true);
                $tutorAvailability = json_decode($tutor->availability_days, true);

                // Check for matches
                $matchingSubjects = array_intersect($studentSubjects ?? [], $tutorSubjects ?? []);
                $matchingDays = array_intersect($studentAvailability ?? [], $tutorAvailability ?? []);

                if (!empty($matchingSubjects) && !empty($matchingDays)) {
                    // Create a tuition entry if a match is found
                    Tuition::create([
                        'tutor_id' => $tutor->id,
                        'student_id' => $student->id,
                    ]);
                }
            }
        }

        return redirect()->route('relationship.index')->with('success', 'Tuition added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the tuition with its associated tutor and student
        $tuition = Tuition::with('tutor','student')->findOrFail($id);

        return view('relationship.show',compact('tuition'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Find and delete the tuition
            $tuition = Tuition::findOrFail($id);
            $tuition->delete();
            Session()->flash('success', 'Tuition deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting tuition: ' . $e->getMessage());
            Session()->flash('error', 'An error occurred while deleting the tuition.');
        }

        return redirect()->route('relationship.index');
    }
}
