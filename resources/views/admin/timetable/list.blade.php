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
                        <h1>Time Table</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#={{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Time Table</li>
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
                                <select name="class_id" class="form-control" id="class_id">
                                    <option value="">Select Class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{$class->id == request('class_id') ? 'selected' : ''}}>{{ $class->name }}</option>
                                    @endforeach
                                </select>
                               </div>
                               <div class="form-group col-md-3">
                                <select name="subject_id" class="form-control" id="subject_id">
                                    <option value="">Select Subject</option>
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ $subject->id == request('subject_id') ? 'selected' : '' }}>
                                            {{ $subject->name }}
                                        </option>
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
                                            <th>Class</th>
                                            <th>Subject</th>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Room Number</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($timetables as $timetable)
                                            <tr>
                                                <td>{{ $timetable->id }}</td>
                                                <td>{{ $timetable->class->name }}</td>
                                                <td>{{ $timetable->subject->name }}</td>
                                                <td>{{ $timetable->day->name }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $timetable->start_time)->format('h:i A') }}</td>
                                                <td>{{ \Carbon\Carbon::createFromFormat('H:i', $timetable->end_time)->format('h:i A') }}</td>

                                                <td>{{ $timetable->room_no }}</td>

                                                 <td>
                                                    <a href="{{ route('timetable.delete', $timetable->id) }}"
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

@section('customJs')
    <script>
        $(document).on('change', '#class_id', function() {
            var class_id = $(this).val();
            console.log('Selected Class ID:', class_id);

            $.ajax({
                url: "{{ route('findSubject') }}", // Make sure this route exists in your web.php
                type: 'GET',
                data: { class_id: class_id },
                dataType: 'json',
                success: function(response) {
                    console.log('Response:', response);

                    // Clear and reset the subject dropdown
                    $('#subject_id').empty().append('<option disabled selected>Select Subject</option>');

                    // If subjects exist, populate the dropdown
                    if (response.status && response.subjects.length > 0) {
                        $.each(response.subjects, function(index, item) {
                            if (item.subject) {
                                $('#subject_id').append(
                                    `<option value="${item.subject.id}">${item.subject.name}</option>`
                                );
                            }
                        });
                    } else {
                        $('#subject_id').append('<option disabled>No Subjects Available</option>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                }
            });
        });
    </script>
@endsection
