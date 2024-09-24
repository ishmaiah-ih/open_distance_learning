@extends('admin.common')
@section('title', 'All Courses | E-HUB')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        All Courses
                        <a href="{{route('course.create')}}" class="btn btn-primary float-end">
                            Add Course
                        </a>
                        @include('admin.includes.flash')
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Instructor</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->course_name }}</td>
                                <td>{{ $course->course_code }}</td>
                                <td>{{ $course->instructor_name }}</td>
                                <td>{{ $course->created_at }}</td>
                                <td>
                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('courses.delete', $course->id) }}" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
