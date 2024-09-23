@extends('admin.common')
@section('title', 'Add Resource | E-HUB')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Add Resource
                        <a href="{{ route('resources.all') }}" class="btn btn-primary float-end">
                            Back
                        </a>
                        @include('admin.includes.flash')
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('resources.store') }}" enctype="multipart/form-data">
                        @csrf

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

                        <!-- Upload Type -->
                        <div class="mb-3">
                            <label for="upload_type" class="form-label">Upload Type</label>
                            <select id="upload_type" class="form-select" name="upload_type" required>
                                <option value="">Select Upload Type</option>
                                <option value="assignment">Assignment</option>
                                <option value="book">Book</option>
                                <option value="lecture">Lecture</option>
                            </select>
                            @error('upload_type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- File Name -->
                        <div class="mb-3">
                            <label for="file_name" class="form-label">File Name</label>
                            <input id="file_name" class="form-control" type="text" name="file_name" required value="{{ old('file_name') }}"/>
                            @error('file_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- File Upload -->
                        <div class="mb-3">
                            <label for="file_path" class="form-label">File Upload</label>
                            <input id="file_path" class="form-control" type="file" name="file_path" accept="*/*" required/>
                            @error('file_path')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">
                                Add Resource
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
