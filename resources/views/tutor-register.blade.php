@extends('layouts.main')

@section('title', 'Register as a Tutor')

@section('content')
<div class="container mt-5 custom-form-container">
    <h2 class="custom-form-heading">Tutor Registration</h2>
    <form action="{{ route('tutor.register.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group custom-form-group">
            <label for="name" class="custom-label">Full Name</label>
            <input type="text" class="form-control custom-input" id="name" name="name" required>
        </div>

        <div class="form-group custom-form-group">
            <label for="email" class="custom-label">Email Address</label>
            <input type="email" class="form-control custom-input" id="email" name="email" required>
        </div>

        <div class="form-group custom-form-group">
            <label for="phone" class="custom-label">Phone Number</label>
            <input type="tel" class="form-control custom-input" id="phone" name="phone" required>
        </div>

        <div class="form-group custom-form-group">
            <label for="location" class="custom-label">Location</label>
            <input type="text" class="form-control custom-input" id="location" name="location" required>
        </div>

        <div class="form-group custom-form-group">
            <label for="profile_picture" class="custom-label">Profile Picture</label>
            <input type="file" class="form-control-file custom-file-input" id="profile_picture" name="profile_picture">
        </div>

        <div class="form-group custom-form-group">
            <label for="bio" class="custom-label">Bio/Personal Statement</label>
            <textarea class="form-control custom-textarea" id="bio" name="bio" rows="3"></textarea>
        </div>

        <div class="form-group custom-form-group">
            <label for="subjects" class="custom-label">Subject Taught</label>
            <select class="form-control custom-select" id="subjects" name="subjects_taught[]">
                <option value="" disabled selected>Select a subject</option>
                <option value="Math">Math</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                <option value="History">History</option>
                <option value="Physics">Physics</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Biology">Biology</option>
            </select>
        </div>

        <div class="form-group custom-form-group">
            <label for="experience" class="custom-label">Teaching Experience</label>
            <textarea class="form-control custom-textarea" id="experience" name="experience" rows="3"></textarea>
        </div>

        <div class="form-group custom-form-group">
            <label class="custom-label">Availability Days</label>
            <div class="custom-checkbox-group">
                <div class="form-check form-check-inline custom-checkbox-item">
                    <input class="form-check-input custom-checkbox" type="checkbox" name="availability_days[]" value="Monday">
                    <label class="form-check-label custom-checkbox-label">Monday</label>
                </div>
                <div class="form-check form-check-inline custom-checkbox-item">
                    <input class="form-check-input custom-checkbox" type="checkbox" name="availability_days[]" value="Tuesday">
                    <label class="form-check-label custom-checkbox-label">Tuesday</label>
                </div>
                <div class="form-check form-check-inline custom-checkbox-item">
                    <input class="form-check-input custom-checkbox" type="checkbox" name="availability_days[]" value="Wednesday">
                    <label class="form-check-label custom-checkbox-label">Wednesday</label>
                </div>
                <div class="form-check form-check-inline custom-checkbox-item">
                    <input class="form-check-input custom-checkbox" type="checkbox" name="availability_days[]" value="Thursday">
                    <label class="form-check-label custom-checkbox-label">Thursday</label>
                </div>
                <div class="form-check form-check-inline custom-checkbox-item">
                    <input class="form-check-input custom-checkbox" type="checkbox" name="availability_days[]" value="Friday">
                    <label class="form-check-label custom-checkbox-label">Friday</label>
                </div>
                <div class="form-check form-check-inline custom-checkbox-item">
                    <input class="form-check-input custom-checkbox" type="checkbox" name="availability_days[]" value="Saturday">
                    <label class="form-check-label custom-checkbox-label">Saturday</label>
                </div>
                <div class="form-check form-check-inline custom-checkbox-item">
                    <input class="form-check-input custom-checkbox" type="checkbox" name="availability_days[]" value="Sunday">
                    <label class="form-check-label custom-checkbox-label">Sunday</label>
                </div>
            </div>
        </div>

        <div class="form-group custom-form-group">
            <label for="hourly_rate" class="custom-label">Hourly Rate</label>
            <input type="number" class="form-control custom-input" id="hourly_rate" name="hourly_rate" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary custom-submit-button">Register</button>
    </form>
</div>
@endsection
