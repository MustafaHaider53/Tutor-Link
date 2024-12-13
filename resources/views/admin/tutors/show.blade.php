@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2>Tutor Profile</h2>
    <div class="card">
        <div class="card-body">
            <!-- Display Profile Picture -->
            @if($tutor['profile_picture'])
                <img src="{{ asset('storage/images/' . $tutor['profile_picture']) }}" alt="{{ $tutor['name'] }}" class="img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover;">
            @else
                <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture" class="img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover;">
            @endif
            
            <h5 class="card-title">{{ $tutor['name'] }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $tutor['email'] }}</p>
            <p class="card-text"><strong>Phone Number:</strong> {{ $tutor['phone'] }}</p>
            <p class="card-text"><strong>Subjects Taught:</strong> {{ $tutor['subjects_taught'] }}</p>
            <p class="card-text"><strong>Availability Days:</strong> {{  $tutor['availability_days'] }}</p>
            <a href="{{ route('admin.tutors.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
