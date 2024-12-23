<?php

namespace App\Http\Controllers;

use App\Models\Tuition;
use App\Models\Tutor;
use App\Models\Student;
use Illuminate\Http\Request;

class RelationShipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tuitions = Tuition::with('tutor','student')->get();

        return view('relationship.index', compact('tuitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
                    try {
                        Tuition::create([
                            'tutor_id' => $tutor->id,
                            'student_id' => $student->id,
                        ]);
                        session()->flash('success', 'Tuition added successfully.');
                    } catch (\Exception $e) {
                        \Log::error('Failed to create tuition: ' . $e->getMessage());
                        session()->flash('error', 'Failed to add tuition.');
                    }
                }
            }
        }

        return redirect()->route('relationship.index');        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tuition = Tuition::with('tutor','student')->findOrFail($id);

        return view('relationship.show',compact('tuition'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tuition = Tuition::findOrFail($id);
        $tuition->delete();
        return redirect()->route('relationship.index')->with('success','Tuition deleted sucessfully');
    }
}
