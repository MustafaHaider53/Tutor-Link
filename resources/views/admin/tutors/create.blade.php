@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Add New Tutor</h1>

        <form action="{{ route('admin.tutors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="form-group ">
                <label for="profile_picture">Profile Picture</label>
                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
            </div>

            <div class="form-group">
                <label for="subjects_taught">Subjects Taught</label>
                <input type="text" name="subjects_taught" id="subjects_taught" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="availability_days">Availability Days</label>
                <input type="text" name="availability_days" id="availability_days" class="form-control" required>
            </div>            

            <button type="submit" class="btn btn-primary">Save Tutor</button>
        </form>
    </div>
@endsection
