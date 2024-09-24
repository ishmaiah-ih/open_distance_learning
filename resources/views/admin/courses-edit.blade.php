<?php
@extends('admin.common')
@section('title', 'Edit Course | E-HUB')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Edit Course
                        <a href="{{ route('courses.index') }}" class="btn btn-primary float-end">Back</a>
                        @include('admin.includes.flash')
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.update', $course->id) }}">
                        @csrf
                        <!-- Course Name -->
                        <div class="mb-3">
                            <label for="course_name" class="form-label">Course Name</label>
                            <input id="course_name" class="form-control" type="text" name="course_name" value="{{ $course->course_name }}" required />
                            @error('course_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Course Code -->
                        <div class="mb-3">
                            <label for="course_code" class="form-label">Course Code</label>
                            <input id="course_code" class="form-control" type="text" name="course_code" value="{{ $course->course_code }}" required />
                            @error('course_code')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Instructor Selection -->
                        <div class="mb-3">
                            <label for="instructor_id" class="form-label">Instructor</label>
                            <select id="instructor_id" class="form-select" name="instructor_id" required>
                                @foreach($instructors as $instructor)
                                    <option value="{{ $instructor->id }}" {{ $instructor->id == $course->instructor_id ? 'selected' : '' }}>
                                        {{ $instructor->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('instructor_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn btn-primary">Update Course</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
