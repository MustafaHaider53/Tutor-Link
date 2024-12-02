<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\Student;


class TuitionController extends Controller
{
    public function findMatches()
{
    $matches = [];

    $students = Student::all();
    $tutors = Tutor::all();

    foreach ($students as $student) {
        foreach ($tutors as $tutor) {
            // Decode the JSON fields to arrays
            $studentSubjects = json_decode($student->subjects_needed, true) ?? [];
            $tutorSubjects = json_decode($tutor->subjects_taught, true) ?? [];
            $studentDays = json_decode($student->availability_days, true) ?? [];
            $tutorDays = json_decode($tutor->availability_days, true) ?? [];

            // Check for overlapping subjects and availability days
            $subjectMatch = array_intersect($studentSubjects, $tutorSubjects);
            $availabilityMatch = array_intersect($studentDays, $tutorDays);

            if ($subjectMatch && $availabilityMatch) {
                $matches[] = [
                    'student' => $student,
                    'tutor' => $tutor,
                    'matching_subjects' => $subjectMatch,
                    'matching_days' => $availabilityMatch,
                ];
            }
        }
    }

    return view('admin.tutors.matches', compact('matches'));
}
}
