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
                        <h1>Student</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#={{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Student List</li>
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
                            <div class="card-header">

                                <form action="">
                                 @csrf
                                    <div class="row">
                                    {{-- * Academic Year Div  --}}
                                    <div class="col-md-4">
                                        <select name='academic_year_id' class="form-control">
                                            <option value="" disabled selected>Select Academic Year</option>
                                            @foreach ($academic_year as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == request('academic_year_id') ? 'selected' : '' }}>{{ $item->year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                   {{-- !  Academic Year Div  --}}


                                   {{-- * class  Div  --}}
                                    <div class="col-md-4">
                                        <select name='class_id' class="form-control">
                                            <option value="" disabled selected>Select Class Name</option>
                                            @foreach ($classes as $item)
                                                <option value="{{ $item->id }}"{{ $item->id == request('class_id') ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                  {{-- ! End class  Div  --}}
                                  <div class="col-md-4">
                                    <input type="submit" value="Filter" class="btn btn-primary btn-sm">
                                  </div>
                                </div>


                                </form>
                            </div>

                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Academic Year</th>
                                            <th>Student Class</th>
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

                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $student->id }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ optional($student->StudentacademicYear)->year }}</td>
                                                <td>{{ optional($student->studentClass)->name }}</td>
                                                <td>{{ $student->father_name }}</td>
                                                <td>{{ $student->mother_name }}</td>
                                                <td>{{ $student->mobile_no }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->created_at }}</td>

                                                <td><a href="{{ route('student.edit', $student->id) }}"
                                                        class="btn btn-primary">Edit</a></td>
                                                <td>
                                                    <a href="{{ route('student.delete', $student->id) }}"
                                                        onclick="return confirm('Are You sure Want to Delete?')"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach


                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Academic Year</th>
                                            <th>Student Class</th>
                                            <th>Father's Name</th>
                                            <th>Mother's Name</th>
                                            <th>Mobile Number</th>
                                            <th>Email</th>
                                            <th>created_at</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
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
