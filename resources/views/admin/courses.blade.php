@extends('admin.common')
@section('title', 'Courses | E-HuB')
@section('content')

    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>
                        Course List
                    </h4>
                    <a href="#" class="btn btn-primary">
                        Add Course
                    </a>
                </div>
                @if (session('success'))
                    <div class="alert bg-gray-200 mx-3 text-white p-2 rounded-md mb-2 mt-2">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped table-hover mb-0">
                        <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Course Code</th>
                            <th>Instructor ID</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($modules as $module)
                            <tr>
                                <td>{{ $module->id }}</td>
                                <td>{{ $module->course_name }}</td>
                                <td>{{ $module->course_code }}</td>
                                <td>{{ $module->instructor_id }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="" class="text-primary me-1 btn btn-primary text-white">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('Are you sure you want to delete this course?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $modules->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
