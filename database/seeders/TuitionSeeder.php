<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tutor;
use App\Models\Student;
use App\Models\Tuition;

class TuitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
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
                    Tuition::create([
                        'tutor_id' => $tutor->id,
                        'student_id' => $student->id,
                    ]);
                }
            }
        }// Fetch all tutors and students
        
    }
}
