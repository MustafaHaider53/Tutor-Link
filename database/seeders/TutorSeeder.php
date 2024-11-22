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
                'subjects_taught' => fake()->randomElement(['Maths','Science','Chemistry','Physics','English','History','Biology']), // Ensure this method exists or use an appropriate Faker method
                'availability_days' => fake()->dayOfWeek(), // Ensure this method exists or use an appropriate Faker method
                'hourly_rate' => fake()->randomFloat(2, 100, 1000)
            ]);
        }
    }
}
