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
                        <h1>Teacher</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#={{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Teacher List</li>
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


                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Father's Name</th>
                                            <th>Mother's Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>created_at</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>{{ $teacher->id }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->father_name }}</td>
                                                <td>{{ $teacher->mother_name }}</td>
                                                <td>{{ $teacher->mobile_no }}</td>
                                                <td>{{ $teacher->email }}</td>
                                                <td>{{ $teacher->created_at }}</td>

                                                <td><a href="{{ route('teacher.edit', $teacher->id) }}"
                                                        class="btn btn-primary">Edit</a></td>
                                                <td>
                                                    <a href="{{ route('teacher.delete', $teacher->id) }}"
                                                        onclick="return confirm('Are You sure Want to Delete?')"
                                                        class="btn btn-danger">Delete</a>
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