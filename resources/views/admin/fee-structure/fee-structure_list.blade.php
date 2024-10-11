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
                        <h1>Fee Structure</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#={{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Fee Structure</li>
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
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header">
                                <h3 class="card-title">Fee Structure List</h3>

                                    <form action="">
                                        @csrf
                                        <div class="form-group col-md-4">
                                            <label>Select Class</label>
                                            <select name="class_id" class="form-control">
                                                <option value="" disabled selected>Select Class</option>
                                                @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id == request()->input('class_id') ? 'selected' : '' }}>{{ $class->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>

                                    {{-- * Academic Year Div  --}}
                                    <div class="form-group col-md-4">
                                        <label>Select Academic Year</label>
                                        <select name="academic_year_id" class="form-control">
                                            <option value="" disabled selected>Select Academic Year</option>
                                            @foreach ($academic_years as $academic_year)

                                            <option value="{{ $academic_year->id }}"
                                                {{ $academic_year->id == request()->input('academic_year_id') ? 'selected' : '' }}>
                                                {{ $academic_year->year }}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success">Filter Data</button>

                                    </div>
                                </form>


                            </div>

                            <div class="card-body table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Fee Structure List</th>
                                            <th>Academic Year</th>
                                            <th>Class</th>
                                            <th>Fee Head</th>
                                            <th>January</th>
                                            <th>February</th>
                                            <th>March</th>
                                            <th>April</th>
                                            <th>May</th>
                                            <th>June</th>
                                            <th>July</th>
                                            <th>August</th>
                                            <th>September</th>
                                            <th>October</th>
                                            <th>November</th>
                                            <th>December</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($feeStructure as $fee)
                                            <tr>
                                                <td>{{ $fee->id }}</td>
                                                <!-- Use camelCase relationship names here -->
                                                <td>{{ $fee->academicYear->year }}</td> <!-- Corrected to academicYear -->
                                                <td>{{ $fee->classes->name }}</td> <!-- Corrected to classes -->
                                                <td>{{ $fee->feeHead->name }}</td> <!-- Corrected to feeHead -->
                                                <td>{{ $fee->january }}</td>
                                                <td>{{ $fee->february }}</td>
                                                <td>{{ $fee->march }}</td>
                                                <td>{{ $fee->april }}</td>
                                                <td>{{ $fee->may }}</td>
                                                <td>{{ $fee->june }}</td>
                                                <td>{{ $fee->july }}</td>
                                                <td>{{ $fee->august }}</td>
                                                <td>{{ $fee->september }}</td>
                                                <td>{{ $fee->october }}</td>
                                                <td>{{ $fee->november }}</td>
                                                <td>{{ $fee->december }}</td>

                                                <td><a href="{{ route('fee-structure.edit', $fee->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                </td>
                                                <td><a href="{{ route('fee-structure.delete', $fee->id) }}"
                                                        onclick="return confirm('Are You sure Want to Delete?')"
                                                        class="btn btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Fee Structure List</th>
                                            <th>Academic Year</th>
                                            <th>Class</th>
                                            <th>Fee Head</th>
                                            <th>January</th>
                                            <th>February</th>
                                            <th>March</th>
                                            <th>April</th>
                                            <th>May</th>
                                            <th>June</th>
                                            <th>July</th>
                                            <th>August</th>
                                            <th>September</th>
                                            <th>October</th>
                                            <th>November</th>
                                            <th>December</th>
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
