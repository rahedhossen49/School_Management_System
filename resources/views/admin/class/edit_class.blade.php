@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Update Class</li>
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
                                <h3 class="card-title">Update Class</h3>
                            </div>


                            <form action="{{route('class.update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$class->id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Update Class Name</label>
                                        <input type="text" name="name" value="{{ old('name', isset($class) ? $class->name : '') }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Update Your Class Name">
                                    </div>
                                  @error('name')
                                  <p class='text-danger'>
                                      {{$message}} </p>
                                  @enderror

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update Class Name</button>
                                    </div>
                            </form>
                        </div>

                    </div>




                </div>

            </div>
        </section>

    </div>
@endsection
