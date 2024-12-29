@extends('layouts.main')

@section('content')


    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="display-4 animate__animated animate__fadeInDown">About Us</h1>
            <p class="lead animate__animated animate__fadeInUp">Welcome to Tutor-Link! We are dedicated to connecting students with the best tutors available.</p>
        </div>
        
        <h2 class="text-center mb-4 animate__animated animate__fadeIn">Testimonials</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm animate__animated animate__zoomIn">
                    <img src="{{asset('image/images1.jpeg')}}" class="card-img-top" alt="John Doe" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <p class="card-text">"Tutor-Link has been a game-changer for my tutoring business. The platform is easy to use and has connected me with so many students!"</p>
                        <p class="card-text"><strong>- John Doe, Math Tutor</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm animate__animated animate__zoomIn animate__delay-1s">
                    <img src="{{asset('image/images2.jpeg')}}" class="card-img-top" alt="Pooja Bhatt" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <p class="card-text">"I love using Tutor-Link! It has helped me find students who are eager to learn and improve their skills."</p>
                        <p class="card-text"><strong>- Pooja Bhatt, English Tutor</strong></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm animate__animated animate__zoomIn animate__delay-2s">
                    <img src="{{asset('image/images3.jpeg')}}" class="card-img-top" alt="Mark Johnson" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <p class="card-text">"Tutor-Link is fantastic! The support team is always helpful and the platform is very user-friendly."</p>
                        <p class="card-text"><strong>- Mark Johnson, Science Tutor</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
