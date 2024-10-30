<header class="bg-primary text-white p-3">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ route('home') }}">Tutor Link</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tutor-register') }}">Tutor Register</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('student-register') }}">Student Register</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('tuition-list') }}">Tuition Listings</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('messages') }}">Messages</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>

            </ul>
        </div>
    </nav>
</header>
