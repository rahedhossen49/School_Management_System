@extends('admin.layout')

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
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Time Table</li>
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
                                <h3 class="card-title">Add Time Table</h3>
                            </div>

                            <form action="{{ route('timetable.store') }}" method="post">
                                @csrf
                                <div class="card-body">

                                    {{-- * Classes Group --}}
                                    <div class="form-group">
                                        <select name="class_id" class="form-control" id="class_id">
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- * Subject Group --}}
                                    <div class="form-group">
                                        <select name="subject_id" class="form-control" id="subject_id">
                                            <option value="" disabled selected>Select Subject</option>
                                            {{-- Subjects will be loaded by AJAX --}}
                                        </select>
                                        @error('subject_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Time Table Inputs --}}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Room Number</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($days as $day)
                                                <tr>
                                                    <td>{{ $day->name }}</td>
                                                    <input type="hidden" name="timetable[{{ $i }}][day_id]" value="{{ $day->id }}">
                                                    <td><input type="time" name="timetable[{{ $i }}][start_time]" id="start_time_{{ $i }}"></td>
                                                    <td><input type="time" name="timetable[{{ $i }}][end_time]" id="end_time_{{ $i }}"></td>
                                                    <td><input type="number" name="timetable[{{ $i }}][room_no]" id="room_no_{{ $i }}" placeholder="Room Number"></td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>



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

@endsection
