@extends('layouts.main')

@section('title', 'Tuition Listings')

@section('content')

<div class="card-grid">
    @foreach ($tutors as $tutor)
        <div class="card animate__animated animate__fadeInUp">
            <div class="card-header animate__animated animate__bounceIn">{{ $tutor->name }}</div>
            <div class="card-content animate__animated animate__zoomIn">
                <img src="{{asset('storage/images/' . $tutor->profile_picture) }}" alt="{{ $tutor->name }}'s profile picture" class="profile-picture">
            </div>
            <div class="card-content animate__animated animate__fadeIn">
                <strong>Email:</strong>
                <form action="{{ route('send.email', $tutor->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="email-button">{{ $tutor->email }}</button>
                </form>
            </div>
            <div class="card-content animate__animated animate__fadeIn"><strong>Phone:</strong> {{ $tutor->phone }}</div>
            <div class="card-content animate__animated animate__fadeIn"><strong>Subjects:</strong> 
                @if(is_array(json_decode($tutor->subjects_taught, true)))
                    {{ implode(', ', json_decode($tutor->subjects_taught, true) ?? []) }}
                @else
                    {{ $tutor->subjects_taught }}
                @endif
            </div>
            <div class="card-content animate__animated animate__fadeIn"><strong>Availability:</strong> 
                @if(is_array(json_decode($tutor->availability_days, true)))
                    {{ implode(', ', json_decode($tutor->availability_days, true) ?? []) }}
                @else
                    {{ $tutor->availability_days }}
                @endif
            </div>
            <div class="card-content animate__animated animate__fadeIn"><strong>Hourly Rate:</strong> {{ $tutor->hourly_rate }}</div>
        </div>
    @endforeach
</div>

@endsection
