@extends('admin.common')
@section('title', 'Students-Courses | E-HuB')
@section('content')

    <div class="row">
        <div class="col col-12">

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>
                    Students-Courses List
                </h4>
                <a href="{{route('addStudentCourse')}}" class="btn btn-primary">
                    Add Student to Course
                </a>
            </div>

            @if (session('success'))
                <div class="alert bg-gray-200 mx-3 text-white p-2 rounded-md mb-2 mt-2">
                    {{ session('success') }}
                </div>
            @endif

            <div class="p-2">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="align-bottom">
                    <tr>
                        <th>ID</th>
                        <th>Student Name</th>
                        <th>Course Name</th>
                        <th>Assigned At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($studentCourses as $studCos)
                        <tr>
                            <td>{{ $studCos->id }}</td>
                            <td>{{ $studCos->student_name }}</td>
                            <td>{{ $studCos->course_name }}</td>
                            <td>{{ $studCos->assigned_at }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="text-primary me-1 btn btn-primary text-white">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('student.course.delete', $studCos->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ml-2"
                                                onclick="return confirm('Are you sure you want to delete this record?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Pagination Links -->
{{--                <div class="d-flex justify-content-center mt-4">--}}
{{--                    {{ $studentCourses->links() }}--}}
{{--                </div>--}}
            </div>

        </div>
    </div>
@endsection
