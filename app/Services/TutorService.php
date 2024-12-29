<?php

namespace App\Services;

use App\Mail\WelcomeMail;
use App\Models\Tutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Mail;

class TutorService
{
    /**
     * Get all tutors.
     */
    public function getAllTutors()
    {
        return Tutor::all();
    }

    /**
     * Create a new tutor.
     */
    public function createTutor(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:tutors',
            'phone' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'subjects_taught' => 'nullable',
            'availability_days' => 'nullable',
            'hourly_rate' => 'required|numeric',
        ]);

        try {
            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                $path = $request->file('profile_picture')->store('images', 'public');
                $data['profile_picture'] = basename($path);
            }

            // Create the tutor record
            $createdTutor = Tutor::create($data);

            \Log::info('Attempting to send email to: ' . $createdTutor->email);

            // Send the welcome email
            Mail::to($createdTutor->email)->send(new WelcomeMail($createdTutor));
            
            \Log::info('Email sent successfully to: ' . $createdTutor->email);

            return ['success' => true, 'message' => 'Tutor added successfully.'];
        } catch (\Exception $e) {
            Log::error('Error creating tutor: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
        }
    }

    /**
     * Get a single tutor by ID.
     */
    public function getTutorById($id)
    {
        return Tutor::findOrFail($id);
    }

    /**
     * Update a tutor.
     */
    public function updateTutor(Request $request, $id)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:tutors,email,' . $id,
            'phone' => 'required|string|max:15',
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'subjects_taught' => 'nullable',
            'availability_days' => 'nullable',
            'hourly_rate' => 'required|numeric',
        ]);

        $tutor = Tutor::findOrFail($id);

        try {
            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                if ($tutor->profile_picture && file_exists(storage_path('app/public/images/' . $tutor->profile_picture))) {
                    unlink(storage_path('app/public/images/' . $tutor->profile_picture));
                }
                $path = $request->file('profile_picture')->store('images', 'public');
                $data['profile_picture'] = basename($path);
            }

            // Update the tutor record
            $tutor->update($data);
            return ['success' => true, 'message' => 'Tutor updated successfully.'];
        } catch (\Exception $e) {
            Log::error('Error updating tutor: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
        }
    }

    /**
     * Delete a tutor.
     */
    public function deleteTutor($id)
    {
        $tutor = Tutor::findOrFail($id);

        try {   
            // Delete the tutor record
            $tutor->delete();
            return ['success' => true, 'message' => 'Tutor deleted successfully.'];
        } catch (\Exception $e) {
            Log::error('Error deleting tutor: ' . $e->getMessage());
            return ['success' => false, 'message' => 'Something went wrong. Please try again later.'];
        }
    }

    /**
     * Search for tutors.
     */
    public function searchTutors($query)
    {
        return Tutor::where('name', 'LIKE', '%' . $query . '%')
            ->orWhere('email', 'LIKE', '%' . $query . '%')
            ->get();
    }
}
