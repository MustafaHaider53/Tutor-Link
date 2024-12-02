<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tutor;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10 ; $i++) { 
            Tutor::create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'phone' => fake()->phoneNumber(),
                'location' => fake()->address(),
                'subjects_taught' => json_encode(fake()->randomElements(['Maths', 'Science', 'Chemistry', 'Physics', 'English', 'History', 'Biology'], 2)), // Generate an array of 2 random subjects
                'availability_days' => json_encode(fake()->randomElements(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'], 3)), // Generate an array of 3 random days
                'hourly_rate' => fake()->randomFloat(2, 100, 1000)
            ]);
        }
    }
}
