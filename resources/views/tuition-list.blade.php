@extends('layouts.main')

@section('title', 'Tuition Listings')

@section('content')
    <h1>Tuition Listings</h1>

    <div class="tutor-listings">
        @foreach ($tutors as $tutor)
            <div class="tutor-card">
                <h2>{{ $tutor->name }}</h2>
                <p><strong>Email:</strong> {{ $tutor->email }}</p>
                <p><strong>Phone:</strong> {{ $tutor->phone }}</p>
                <p><strong>Subjects:</strong> {{ implode(', ', json_decode($tutor->subjects_taught, true) ?? []) }}</p>
                <p><strong>Availability:</strong> {{ implode(', ', json_decode($tutor->availability_days, true) ?? []) }}</p>
                <p><strong>Hourly Rate:</strong> {{ $tutor->hourly_rate }}</p>
            </div>
        @endforeach
    </div>
@endsection
