@extends('teacher.layout')

@section('content')

<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">

        <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>


        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </div>
        </div>
        </div>
        </div>


        <div class="container mt-5 text-center">
            <h3 class="text-dark">Hi Student</h3>
            <h1 class="display-3 fw-bold text-primary">Welcome to</h1>
            <h2 class="display-2 text-uppercase text-dark">Chittagong Government School</h2>
            <p class="lead mt-4 text-muted">Providing quality education for future generations with a focus on excellence and discipline.</p>
        </div>

</div>


@endsection
