@extends('layouts.main')

@section('title', 'Tutor Profile')


@section('content')
<div class="container mt-5">
    <h2>Your Profile</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $student['name'] }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $student['email'] }}</p>
            <p class="card-text"><strong>Phone Number:</strong> {{ $student['phone'] }}</p>
            <p class="card-text"><strong>Location:</strong> {{ $student['location'] }}</p>
            <p class="card-text"><strong>Subjects Needed:</strong> {{ implode(', ', $student['subjects']) }}</p>
            <p class="card-text"><strong>Preferred Learning Style:</strong> {{ $student['learning_style'] }}</p>
            <p class="card-text"><strong>Available Days:</strong> {{ implode(', ', $student['availability_days']) }}</p>
            <p class="card-text"><strong>Additional Notes:</strong> {{ $student['notes'] }}</p>
            <a href="{{ route('student.edit', ['id' => 1]) }}" class="btn btn-primary">Edit Profile</a>
        </div>
    </div>
</div>
@endsection

