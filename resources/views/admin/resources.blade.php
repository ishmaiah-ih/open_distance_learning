@extends('admin.common')
@section('title', 'Resources | E-HuB')
@section('content')

    <div class="row">
        <div class="col col-12">
            <div class="card">
                <!-- Card Header with Centered Dropdown and Right-aligned Button -->
                <div class="card-header d-flex justify-content-center align-items-center">
                    <div class="d-flex flex-column align-items-center">
                        <h4 class="text-center mb-3">Resources List</h4>

                        <!-- Filter Dropdown for Course Name -->
                        <form action="{{ route('resources.all') }}" method="GET" class="d-flex">
                            <select name="course_name" class="form-select me-2" onchange="this.form.submit()">
                                <option value="">Filter by Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->course_name }}"
                                        {{ request('course_name') == $course->course_name ? 'selected' : '' }}>
                                        {{ $course->course_name }}
                                    </option>
                                @endforeach
                            </select>
                            <noscript><button type="submit" class="btn btn-primary">Filter</button></noscript>
                        </form>
                    </div>

                    <!-- Add Resource Button -->
                    <a href="{{ route('resources.get') }}" class="btn btn-primary ms-auto">
                        Add Resource
                    </a>
                </div>

                @include('admin.includes.flash')
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped table-hover mb-0">
                        <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Course Name</th>
                            <th>Upload Type</th>
                            <th>File Name</th>
                            <th>Upload Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">
                        @foreach($resources as $resource)
                            <tr>
                                <td>{{ $resource->id }}</td>
                                <td>{{ $resource->course->course_name ?? 'N/A' }}</td>
                                <td>{{ $resource->upload_type }}</td>
                                <td>{{ $resource->file_name }}</td>
                                <td>{{ $resource->upload_date }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('resources.edit', $resource->id) }}"
                                           class="text-primary me-1 btn btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('resources.delete', $resource->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this resource?')">
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
                    <div class="d-flex justify-content-center mt-4">
                        {{ $resources->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
