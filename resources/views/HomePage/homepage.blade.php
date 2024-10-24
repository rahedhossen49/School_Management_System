@yield('Homepage')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educator Theme</title>

</head>
<body>


<div class="topbar py-2">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <span>Student Home</span>
            <a href="tel:+443003030266">Call +44 300 303 0266</a>
        </div>
        <div>
            <a href="#">Follow Us</a>
            <div class="social-icons d-inline-block">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-linkedin"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </div>
</div>

@include('HomePage.layout.css')
<!-- Top Bar -->

<style>
/* Custom CSS */
.navbar {
    background-color: #f8f9fa;
}
.carousel-inner img {
    height: 500px;
    object-fit: cover;
}
.topbar {
    background-color: #ececec;
    font-size: 14px;
}
.topbar a {
    color: #000;
    margin-right: 15px;
}
.topbar .social-icons i {
    margin-right: 10px;
}
.navbar-brand img {
    height: 40px;
}
.nav-link {
    font-weight: bold;
    margin-right: 15px;
}
.carousel-caption {
    background: rgba(0, 0, 0, 0.5);
    padding: 10px;
}
</style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{asset('admin_panel/school/logo.png')}}" style="height: 80px;" alt="Educator Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <li><a class="dropdown-item" href="{{route('HomePage.Ourteacher')}}">Our Teachers</a></li>
                        <li><a class="dropdown-item" href="{{route('HomePage.OurStudent')}}">Our Studentt</a></li>
                        <li><a class="dropdown-item" href="{{route('teacher.dashboard')}}">Teachers Login</a></li>
                        <li><a class="dropdown-item" href="{{route('student.dashboard')}}">Student Login</a></li>
                        </ul>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{route('HomePage.notice')}}">Notice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


@include('HomePage.layout.content')




<div class="container text-center py-5">
    <h2 class="mb-3">School Features</h2>
    <p class="mb-5">Etiam porttitor risus massa nec condiment gravida nibh vel velit auctor aliquetnean sollicitudin, lorem quis bibendum auci elit consequat ipsumut sem nibh id elit.</p>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <i class="bi bi-file-earmark" style="font-size: 3rem; color: #FF5733;"></i>
                <h5 class="mt-3">Certified</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <i class="bi bi-house-door" style="font-size: 3rem; color: #33AFFF;"></i>
                <h5 class="mt-3">Daycare</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <i class="bi bi-journal-bookmark" style="font-size: 3rem; color: #FF5733;"></i>
                <h5 class="mt-3">Learning</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <i class="bi bi-tree" style="font-size: 3rem; color: #FF5733;"></i>
                <h5 class="mt-3">Outdoors</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <i class="bi bi-calendar" style="font-size: 3rem; color: #33AFFF;"></i>
                <h5 class="mt-3">Healthy Meals</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex flex-column align-items-center">
                <i class="bi bi-calendar-event" style="font-size: 3rem; color: #33FF57;"></i>
                <h5 class="mt-3">Events</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
        </div>
    </div>
</div>




<div class="container py-5">
    <h2 class="text-center mb-4">Latest Events</h2>
    <p class="text-center mb-5">Etiam porttitor risus massa nec condiment gravida nibh vel velit auctor aliquetnean sollicitudin, lorem quis bibendum auci elit consequat ipsumut sem nibh id elit.</p>
    <div class="row justify-content-center"> <!-- Added justify-content-center for centering the cards -->

        <!-- First Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5"> <!-- Adjusted for better responsiveness -->
            <div class="card">
                <img src="{{ asset('admin_panel/dist/img/avatar4.png') }}" class="card-img-top" alt="Event 1" style="height: 150px;"> <!-- Adjusted image height -->
                <div class="card-body">
                    <h5 class="card-title">Summer Camp</h5>
                    <p class="card-text"><i class="bi bi-geo-alt"></i> 354 Shuter St Toronto</p>
                </div>
            </div>
        </div>

        <!-- Second Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
            <div class="card">
                <img src="{{ asset('admin_panel/dist/img/avatar4.png') }}" class="card-img-top" alt="Event 2" style="height: 150px;">
                <div class="card-body">
                    <h5 class="card-title">Sports Day</h5>
                    <p class="card-text"><i class="bi bi-geo-alt"></i> 244 Lisgar St Toronto</p>
                </div>
            </div>
        </div>

        <!-- Third Card -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
            <div class="card">
                <img src="{{ asset('admin_panel/dist/img/avatar4.png') }}" class="card-img-top" alt="Event 3" style="height: 150px;">
                <div class="card-body">
                    <h5 class="card-title">School Play</h5>
                    <p class="card-text"><i class="bi bi-geo-alt"></i> 354 Shuter St Toronto</p>
                </div>
            </div>
        </div>

    </div>
</div>




<footer class="bg-dark text-light py-4" style=" bottom: 0; width: 100%; margin-top: 100px;">
    <div class="container">
        <div class="row">
            <!-- Educate Section -->
            <div class="col-md-3 col-12 mb-4">
                <h5 class="text-uppercase">Educate</h5>
                <p>Providing life-changing experiences through education. Class that fits your busy life, closer to home.</p>
                <p><i class="bi bi-telephone"></i> 1-677-124-44227</p>
                <p><i class="bi bi-clock"></i> Mon - Sat 8:00 - 18:00</p>
            </div>

            <!-- Latest News Section -->
            <div class="col-md-3 col-12 mb-4">
                <h5 class="text-uppercase">Latest News</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Graduate Admissions</a> <br> by Craig Murphy</li>
                    <li><a href="#" class="text-light">Continuing Education</a> <br> by Craig Murphy</li>
                    <li><a href="#" class="text-light">Current Students</a> <br> by Craig Murphy</li>
                </ul>
            </div>

            <!-- Useful Links Section -->
            <div class="col-md-3 col-12 mb-4">
                <h5 class="text-uppercase">Useful Links</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light">Popular Courses</a></li>
                    <li><a href="#" class="text-light">Forums</a></li>
                    <li><a href="#" class="text-light">Our Teachers</a></li>
                    <li><a href="#" class="text-light">Upcoming Events</a></li>
                    <li><a href="#" class="text-light">Contact Us</a></li>
                </ul>
            </div>

            <!-- Flexible Learning Section -->
            <div class="col-md-3 col-12 mb-4">
                <h5 class="text-uppercase">Flexible Learning</h5>
                <div class="ratio ratio-16x9">
                    <!-- Embedded Google Map -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.648148030093!2d90.38777921536355!3d23.793174792332748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c743812bb3f9%3A0xa9347f90e2a15d47!2sBAF%20Shaheen%20College!5e0!3m2!1sen!2sbd!4v1603065290095!5m2!1sen!2sbd"
                        width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="row">
            <div class="col-12 text-center mt-3">
                <p class="text-light mb-0">&copy; 2024 XYZ Chittagong, Powered By: XYZ</p>
            </div>
        </div>
    </div>


<!-- CSS for Footer Behavior -->
</footer>
<!-- Bootstrap JS and Popper.js -->






@include('HomePage.layout.Js')
</body>
</html>
