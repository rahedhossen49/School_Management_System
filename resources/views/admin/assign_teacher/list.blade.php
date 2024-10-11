@extends('admin.layout')

@section('customCss')
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
    <div class="content-wrapper">

        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assign Subject To Teacher</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#={{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Assign Subject To Teacher</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            @if (Session::has('success'))
                            <div class="alert alert-success ">
                                {{ Session::get('success') }}
                                </div>

                            @endif
                            <div class="card-header ">
                                <form action="" class="row">
                               <div class="form-group col-md-3">
                                <select name="class_id" class="form-control" id="">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{$class->id == request('class_id') ? 'selected' : ''}}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                               </div>
                               <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-primary">Filter</button>
                               </div>
                            </form>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Class Name</th>
                                            <th>Subject Name</th>
                                            <th>Teacher Name</th>
                                            <th>Theory/Practical</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($assign_teachers as $assign_teacher)
                                            <tr>
                                                <td>{{ $assign_teacher->id }}</td>
                                                <td>{{ $assign_teacher->class->name}}</td>
                                                <td>{{ $assign_teacher->subject->name}}</td>
                                                <td>{{ $assign_teacher->subject->type}}</td>
                                                <td>{{ optional($assign_teacher->teacher)->name ?? 'No teacher assigned' }}</td>
                                                <td>{{ $assign_teacher->created_at }}</td>
                                                <td><a href="{{route('assign-teacher.edit',$assign_teacher->id)}}" class="btn btn-primary">Edit</a>
                                                </td>
                                                <td><a href="{{route('assign-teacher.delete',$assign_teacher->id)}}" onclick="return confirm('Are You sure Want to Delete?')" class="btn btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
