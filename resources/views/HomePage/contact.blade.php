

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
<!-- Single Image Section -->
<div class="text-center my-5">
    <img src="{{asset('admin_panel/school/imag.jpg')}}" class="img-fluid" alt="Contact Us" style="max-width: 1800px; height: 400px;">
</div>

<!-- Contact Form and Address -->
<div class="container my-5"> <!-- Container for left/right gaps -->
    <div class="row g-3 justify-content-center"> <!-- 'g-3' for gap between columns -->

        <!-- Address Section -->
        <div class="col-md-6 d-flex flex-column align-items-center">
            <h4>Our Address</h4>
            <p>3rd Gate, Near Shaheed Jahangir Gate, Dhaka 1206</p>
            <p>Email: info@bafsd.edu.bd, infobafsd@gmail.com</p>
            <p>Phone: +৮৮০১৭০৪-০৯৬৪৫২</p>
        </div>


           <!-- Contact Form -->
           <div class="col-md-6 d-flex flex-column align-items-center">
            <form class="w-100">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Write a Message</label>
                    <textarea class="form-control" id="message" rows="3" placeholder="Write a message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
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
