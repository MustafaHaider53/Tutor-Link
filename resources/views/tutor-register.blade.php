@extends('layouts.main')

@section('title', 'Register as a Tutor')

@section('content')
<div class="container mt-5">
    <h2>Tutor Registration</h2>
    <form action="{{ route('tutor.register.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        <div class="form-group">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
        </div>

        <div class="form-group">
            <label for="bio">Bio/Personal Statement</label>
            <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="subjects">Subject Taught</label>
            <select class="form-control" id="subjects" name="subjects_taught[]">
                <option value="" disabled selected>Select a subject</option>
                <option value="Math">Math</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                <option value="History">History</option>
                <option value="Physics">Physics</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Biology">Biology</option>
                <!-- Add more subjects as needed -->
            </select>
        </div>
        

        <div class="form-group">
            <label for="experience">Teaching Experience</label>
            <textarea class="form-control" id="experience" name="experience" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="availability_days">Availability Days</label>
            <div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="availability_days[]" value="Monday">
                    <label class="form-check-label">Monday</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="availability_days[]" value="Tuesday">
                    <label class="form-check-label">Tuesday</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="availability_days[]" value="Wednesday">
                    <label class="form-check-label">Wednesday</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="availability_days[]" value="Thursday">
                    <label class="form-check-label">Thursday</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="availability_days[]" value="Friday">
                    <label class="form-check-label">Friday</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="availability_days[]" value="Saturday">
                    <label class="form-check-label">Saturday</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="availability_days[]" value="Sunday">
                    <label class="form-check-label">Sunday</label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="hourly_rate">Hourly Rate</label>
            <input type="number" class="form-control" id="hourly_rate" name="hourly_rate" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

@endsection
