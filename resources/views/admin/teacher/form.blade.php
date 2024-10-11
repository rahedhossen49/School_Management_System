@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Teacher</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Teacher</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">
                            @if (Session::has('success'))
                                <div class="alert alert-success ">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Add Teacher</h3>
                            </div>
                            {{-- * Form Div Start  --}}
                            <form action="{{ route('teacher.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">



                                    {{-- * Teacher Div Start  --}}

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="student">Teacher Name</label>
                                            <input type="text" name="name" class="form-control" id="student"
                                                placeholder="Enter Student Name"  value="{{ old('name') }}" >
                                                @error('name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="father">Father Name</label>
                                            <input type="text" name="father_name" class="form-control" id="father"
                                                placeholder="Enter Father Name"  value="{{ old('father_name') }}">
                                                @error('father_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="mother">Mother Name</label>
                                            <input type="text" name="mother_name" class="form-control" id="mother"
                                                placeholder="Enter Mother Name"  value="{{ old('mother_name') }}">
                                                @error('mother_name')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror

                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="dob">Date Of Birth</label>
                                            <input type="date" name="dob" class="form-control" id="dob"  value="{{ old('dob') }}">
                                            @error('dob')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="mobile">Mobile Number</label>
                                            <input type="number" name="mobile_no" class="form-control" id="mobile"
                                                placeholder="Enter Mobile Number"  value="{{ old('mobile_no') }}">
                                                @error('mobile_no')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="email"
                                                placeholder="Enter Email Address"  value="{{ old('email') }}">
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="password">Create Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="Enter Password">
                                                @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        {{-- ! end Teacher Div Start  --}}

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Add Teacher</button>
                                    </div>
                                </div>
                            </form>
                            {{-- ! End Form Div Start  --}}

                        </div>
                    </div>




                </div>

            </div>
        </section>

    </div>
@endsection