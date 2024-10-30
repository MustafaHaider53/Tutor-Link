@extends('layouts.main')

@section('title', 'Student Registration')

@section('content')
<div class="container mt-5">
    <h2>Student Registration</h2>
    <form action="{{ route('student.register.submit') }}" method="POST" enctype="multipart/form-data">
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
            <label for="subjects">Subjects Needed</label>
            <select multiple class="form-control" id="subjects" name="subjects_needed[]" size="5">
                <option value="Math">Math</option>
                <option value="Science">Science</option>
                <option value="English">English</option>
                <option value="History">History</option>
                <option value="Physics">Physics</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Biology">Biology</option>
                <!-- Add more subjects as needed -->
            </select>
            <small class="form-text text-muted">Hold down the Ctrl (Windows) or Command (Mac) button to select multiple subjects.</small>
        </div>
        
        <div class="form-group">
            <label for="learning_style">Preferred Learning Style</label>
            <select class="form-control" id="learning_style" name="learning_style" required>
                <option value="" disabled selected>Select a learning style</option>
                <option value="Visual">Visual</option>
                <option value="Auditory">Auditory</option>
                <option value="Kinesthetic">Kinesthetic</option>
                <!-- Add more learning styles as needed -->
            </select>
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
            <label for="notes">Additional Notes/Requests</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="profile_picture">Profile Picture (optional)</label>
            <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" clsass="form-control" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

@endsection
