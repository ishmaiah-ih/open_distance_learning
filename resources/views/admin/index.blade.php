@extends('admin.common')

@section('title', 'Dashboard | E-Hub')

@section('content')
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Students</p>
                <h5 class="font-weight-bolder mb-0">
                    {{$totalStudents}}
                    <br>
                </h5>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Today Instructors</p>
                <h5 class="font-weight-bolder mb-0">
                 {{$totalInstructors}}

                    <br>

                </h5>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">All Resources</p>
                <h5 class="font-weight-bolder mb-0">
{{$allResources}}
                    <br>
                </h5>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card card-body p-3">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Available courses</p>
                <h5 class="font-weight-bolder mb-0">
                    {{ $allCourses }}
                    <br>

                </h5>
            </div>
        </div>
    </div>
@endsection
