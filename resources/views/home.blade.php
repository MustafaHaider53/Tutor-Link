@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="jumbotron text-center my-5 bg-light p-5 rounded shadow-lg">
        <h1 class="display-4 font-weight-bold text-primary animate__animated animate__fadeInDown">Welcome to Tutor Link</h1>
        <p class="lead text-secondary animate__animated animate__fadeInUp">Connecting students with tutors for personalized learning experiences.</p>
        <div class="mt-4">
            <a href="{{ route('tutor-register') }}" class="btn btn-primary btn-lg custom-home-regbtn mx-2 animate__animated animate__zoomIn">Register as a Tutor</a>
            <a href="{{ route('tuition-list') }}" class="btn btn-secondary btn-lg custom-home-findbtn mx-2 animate__animated animate__zoomIn">Find a Tutor</a>
            <a href="{{ route('admin.tutors.index') }}" class="btn btn-secondary btn-lg custom-home-findbtn mx-2 animate__animated animate__zoomIn">Admin</a>
        </div>
    </div>
@endsection

