

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
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                        <li><a class="dropdown-item" href="{{route('teacher.dashboard')}}">Our Teachers</a></li>
                        <li><a class="dropdown-item" href="{{route('student.dashboard')}}">Our Student</a></li>
                        <li><a class="dropdown-item" href="#">Contact Us</a></li>
                        <li><a class="dropdown-item" href="#">FAQ Page</a></li>
                        </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Notice</a>
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

<style>
    .teacher-card {
        border: 1px solid #ddd; /* Optional: Adds a border around the card */
        border-radius: 10px; /* Optional: Rounded corners */
        overflow: hidden; /* Ensures content doesn't overflow */
        transition: transform 0.2s; /* Adds a nice hover effect */
    }

    .teacher-card:hover {
        transform: scale(1.05); /* Scale up on hover */
    }

    .teacher-image {
        width: 100%; /* Makes image responsive */
        height: auto; /* Maintains aspect ratio */
    }

    .teacher-name {
        font-weight: bold;
    }

    .teacher-position {
        color: gray; /* Optional: Change color for position */
    }
</style>
</head>
<body>

<div class="container mt-5">
<div class="row">

    <!-- Teacher  -->


    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <div class="teacher-card text-center p-3">
            <img src="https://via.placeholder.com/150" alt="Rosa Echols" class="teacher-image">
            <p class="teacher-name">Rosa Echols</p>
            <p class="teacher-position">Subject Teacher</p>
        </div>
    </div>


</div>
</div>





<footer class="bg-dark text-light py-4 " style="margin-top: 100px;">
    <div class="container">
        <div class="row px-3 mt-4">
            <!-- Contact and Google Map -->
            <div class="col-12 col-sm-6 mb-4">  <!-- Changed to col-12 for extra small devices -->
                <h5>Contact</h5>
                <p>02-9836440</p>
                <h5>Google Map</h5>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.648148030093!2d90.38777921536355!3d23.793174792332748!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c743812bb3f9%3A0xa9347f90e2a15d47!2sBAF%20Shaheen%20College!5e0!3m2!1sen!2sbd!4v1603065290095!5m2!1sen!2sbd"
                        width="100%" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                    </iframe>
                </div>
            </div>

            <!-- Address and Email Us -->
            <div class="col-12 col-sm-6 mb-4 ps-md-5">  <!-- Changed to col-12 for extra small devices -->
                <h5>Address</h5>
                <p>3rd Gate, Near Xyz Gate, Chittagong 1206</p>
                <h5>Email Us</h5>
                <p><a href="mailto:XYZ@.edu.bd" class="text-light">XYZ@.edu.bd</a></p>
                <p><a href="mailto:XYZ@gmail.com" class="text-light">XYZ@gmail.com</a></p>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="row">
            <div class="col-12 text-center mt-3 bg-secondary">
                <p class="text-white mb-0">&copy; 2024 XYZ Chittagong, Powered By: XyZ</p>
            </div>
        </div>

        </div>
    </div>
</footer>

@include('HomePage.layout.Js')
