<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=0; $i < 10 ; $i++) { 
            Student::create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(),
                'location' => fake()->address(),
                'subjects_needed' => fake()->word(), // Ensure this method exists or use an appropriate Faker method
                'learning_style' => fake()->randomElement(['visual', 'auditory', 'kinesthetic']), // Example of generating random learning styles
                'availability_days' => fake()->dayOfWeek(), // Ensure this method exists or use an appropriate Faker method
                'notes' => 'No'
            ]);
        }
        
    }
}
