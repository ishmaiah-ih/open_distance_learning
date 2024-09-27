@extends('admin.common')
@section('title', 'Add Student to Course | E-HUB')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Add Student to Course
                        <a href="{{ route('student.courses') }}" class="btn btn-primary float-end">
                            Back
                        </a>

                        @include('admin.includes.flash')
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('storeStudentCourse') }}">
                        @csrf

                        <!-- Student Selection -->
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student</label>
                            <select id="student_id" class="form-select" name="student_id" required>
                                <option value="">Select Student</option>
                                @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Course Selection -->
                        <div class="mb-3">
                            <label for="course_id" class="form-label">Course</label>
                            <select id="course_id" class="form-select" name="course_id" required>
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">
                                Add Student to Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
