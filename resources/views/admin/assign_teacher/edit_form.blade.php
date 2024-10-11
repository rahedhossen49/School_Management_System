@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Assign Teacher Update</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Assign Teacher Update</li>
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
                                <h3 class="card-title">Update Teacher to Class</h3>
                            </div>


                            <form action="{{route('assign-teacher.update',$assign_teacher->id)}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <select name="class_id" class="form-control" id="class_id">
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{$class->id == $assign_teacher->class_id ? 'selected' : ''}}>{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <select name="subject_id" class='form-control' id="subject_id">
                                            <option disabled>Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->subject->id }}"
                                                    {{ $assign_teacher->subject_id == $subject->subject->id ? 'selected' : '' }}>
                                                    {{ $subject->subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>



                                    @error('subject_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror


                                    <div class="form-group">
                                        <select name="teacher_id" class="form-control" id="teacher_id">
                                          <option value="" disabled selected>Select Teacher</option>
                                          @foreach ($teachers as $teacher)
                                          <option value="{{$teacher->id}}" {{$assign_teacher->teacher_id == $teacher->id ? 'selected' : ''}}>{{$teacher->name}}</option>
                                          @endforeach
                                        </select>
                                        @error('teacher_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                      </div>


                                </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                            </form>
                        </div>

                    </div>




                </div>

            </div>
        </section>

    </div>
@endsection


@section('customJs')
<script>
$(document).on('change', '#class_id', function() {
    var class_id = $(this).val();
    console.log('Selected Class ID:', class_id);

    $.ajax({
        url: "{{ route('findSubject') }}", // Ensure this route is correct
        type: 'get',
        data: { class_id: class_id }, // Passing the class_id
        dataType: 'json',
        success: function(response) {
            console.log('Response:', response); // Log the response

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
            console.error('AJAX Error:', error); // Log any error in case of failure
        }
    });
});

</script>

@endsection
