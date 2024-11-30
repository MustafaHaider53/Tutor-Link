@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div  class="jumbotron text-center my-5">
        <h1 style class="display-4" >Welcome to Tutor Link</h1>
        <p class="lead">Connecting students with tutors for personalized learning experiences.</p>
        <a href="{{ route('tutor-register') }}" class="btn btn-primary btn-lg custom-home-regbtn">Register as a Tutor</a>
        <a s href="{{ route('tuition-list') }}" class="btn btn-secondary btn-lg custom-home-findbtn">Find a Tutor</a>
        <a s href="{{ route('admin.tutors.index') }}" class="btn btn-secondary btn-lg custom-home-findbtn">Admin</a>
        
    </div>
@endsection
