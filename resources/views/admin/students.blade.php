@extends('admin.common')
@section('title', 'Students | E-HuB')
@section('content')

    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>
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
                <div class="card-body p-0">
                    <table class="table table-bordered table-striped table-hover mb-0" >
                        <thead class="text-center">
                        <tr>

                            <th>Id</th>
                            <th>Name</th>
                            <th>Reg #</th>
                            <th>Program</th>
                            <th>Email</th>
                            <th>Phone</th>
{{--                            <th>Year</th>--}}
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
                                <td>{{ $student->email}}</td>
                                <td>{{ $student->phone}}</td>
{{--                                <td>{{ $student->year}}</td>--}}

                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="" class="text-primary me-1 btn btn-primary text-white">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{route('student.delete', $student->id)}}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ml-2" onclick="return confirm('Are you sure you want to delete this customer?')">
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
{{--                        {{ $customers->links() }}--}}
                        {{ $students->links() }}


{{--                        {{ $customers->links('pagination::bootstrap-4') }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
