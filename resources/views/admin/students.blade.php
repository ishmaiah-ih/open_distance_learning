@extends('admin.common')
@section('title', 'Students | E-HuB')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    Student's List
                </h4>
                <a href="{{route('student.add')}}" class="btn btn-primary">
                    Add Student
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
                        <th>Id</th>
                        <th>Name</th>
                        <th>Reg #</th>
                        <th>Program</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name}}</td>
                            <td>{{ $student->reg}}</td>
                            <td>{{ $student->program}}</td>
                            <td>{{ Str::limit($student->email, 15) }}</td> <!-- Truncating email to 15 characters -->
                            <td>{{ $student->phone}}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <a href="" class="btn btn-primary text-white me-1">
                                        <i class="fas fa-eye fa-sm"></i>
                                    </a>
                                    <form action="{{route('student.delete', $student->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger text-white ml-2"
                                                onclick="return confirm('Are you sure you want to delete this customer?')">
                                            <i class="fas fa-trash fa-sm"></i>
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
                    {{ $students->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
