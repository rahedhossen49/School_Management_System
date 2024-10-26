<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from adminlte.io/themes/v3/index3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 May 2024 05:16:31 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Student | Dashboard 3</title>
    <base href="{{ asset('admin_panel') }}/" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">

    @yield('customCss')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('home')}}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('contact')}}" class="nav-link">Contact</a>
                </li>
            </ul>

            {{-- <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul> --}}
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">CH-GV-School</span>
            </a>

            <div class="sidebar">

                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">




                        <li class="nav-item">
                            <a href="{{route('student.dashboard')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('student.mySubject')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                   My Subject
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('student.logout')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                   Logout
                                </p>
                            </a>
                        </li>




                        {{-- * academic year nav --}}
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Academic Year
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('academic-year.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Record</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('academic-year.read') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Record</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}

                        {{-- * class nav --}}
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Class Mangement
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('class.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Record</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('class.read') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Record</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}


                          {{-- * Fee Head nav --}}
                          {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Fee Head Mangement
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('fee-head.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Record</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('fee-head.read') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Record</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}

                          {{-- * Fee Structure nav --}}
                          {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Fee Structure M-G-M-T
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('fee-structure.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Record</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('fee-structure.read') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View Record</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}

                          {{-- * Student nav --}}
                          {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Student Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('student.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Student</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('student.read') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Student View</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}



                    </ul>
                </nav>

            </div>

        </aside>


        @yield('content')


        <aside class="control-sidebar control-sidebar-dark">

        </aside>


        <footer class="main-footer">
            <strong>Copyright &copy; 2024-2040 Chittagong Goverment School.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">

            </div>
        </footer>
    </div>



    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="dist/js/adminlte2167.js?v=3.2.0"></script>

    <script src="plugins/chart.js/Chart.min.js"></script>

    <script src="dist/js/demo.js"></script>

    <script src="dist/js/pages/dashboard3.js"></script>

</body>

</html>
