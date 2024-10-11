@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee Head</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Update Fee Head</li>
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
                                <h3 class="card-title">Update Fee Head Name</h3>
                            </div>


                            <form action="{{route('fee-head.update')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$feeHead->id}}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"> Update Fee Head Name</label>
                                        <input type="text" name="name" value="{{ old('name', isset($feeHead) ? $feeHead->name : '') }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Update Fee Head Name">
                                    </div>
                                  @error('name')
                                  <p class='text-danger'>
                                      {{$message}} </p>
                                  @enderror

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update Fee Head Name</button>
                                    </div>
                            </form>
                        </div>

                    </div>




                </div>

            </div>
        </section>

    </div>
@endsection