@extends('layouts.main')

@section('title', 'Messages')

@section('content')
    <h2 class="my-4">Messages</h2>
    <ul class="list-group mb-4" style="max-width: 600px; margin: auto;">
        <li class="list-group-item">Hi, are you available for Math tutoring?</li>
        <li class="list-group-item list-group-item-secondary">Yes, I am available!</li>
        <!-- Additional messages -->
    </ul>
    <form class="mx-auto" style="max-width: 600px;">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Type your message">
            <button class="btn btn-primary" type="button">Send</button>
        </div>
    </form>
@endsection
