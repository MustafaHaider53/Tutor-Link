<footer class="bg-dark text-white text-center py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5>About Us</h5>
                <p>TutorLink is a platform connecting students with tutors for personalized learning experiences.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{route('home')}}" class="text-white">Home</a></li>
                    <li><a href="{{route('aboutUs')}}" class="text-white">About</a></li>
                    <li><a href="#" class="text-white">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Contact Us</h5>
                <p>Email: support@tutorlink.com</p>
                <p>Phone: +123 456 7890</p>
                <div class="social-icons">
                    <a href="https://www.facebook.com/?_rdc=1&_rdr#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://x.com/?lang=en" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                    <a href="https://pk.linkedin.com/" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <hr class="bg-white">
        <p>&copy; {{ date('Y') }} TutorLink. All rights reserved.</p>
    </div>
</footer>
