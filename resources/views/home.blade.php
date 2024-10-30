@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="jumbotron text-center my-5">
        <h1 class="display-4">Welcome to Tutor Link</h1>
        <p class="lead">Connecting students with tutors for personalized learning experiences.</p>
        <a href="{{ route('tutor-register') }}" class="btn btn-primary btn-lg">Register as a Tutor</a>
        <a href="{{ route('tuition-list') }}" class="btn btn-secondary btn-lg">Find a Tutor</a>
    </div>
@endsection
