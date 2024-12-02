@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Edit Tutor</h1>

        <form action="{{ route('admin.tutors.update', $tutor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $tutor->name }}" required>a
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $tutor->email }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ $tutor->phone }}" required>
            </div>

            <div class="form-group">
                <label for="subjects_taught">Subjects Taught</label>
                <input type="text" name="subjects_taught" id="subjects_taught" class="form-control" value="{{ $tutor->subjects_taught }}" required>
            </div>

            <div class="form-group">
                <label for="availability_days">Availability Days</label>
                <input type="text" name="availability_days" id="availability_days" class="form-control" value="{{ $tutor->availability_days }}" required>
            </div>

            
            <button type="submit" class="btn btn-primary">Update Tutor</button>
        </form>
    </div>
@endsection
