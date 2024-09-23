@extends('admin.common')
@section('title', 'Resources | E-HuB')
@section('content')

    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>
                        Resources List
                    </h4>
                    <a href="{{ route('resources.get') }}" class="btn btn-primary">
                        Add Resource
                    </a>
                </div>
                @if (session('success'))
                    <div class="alert bg-gray-200 text-dark p-2 rounded-md mb-2 mt-2">
                        {{ session('success') }}
                    </div>
                @endif
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
{{--                                <td>{{ $resource->instructor_id }}</td>--}}
                                <td>{{ $resource->course->course_name ?? 'N/A' }}</td> <!-- Render Course Name -->
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
