@include('front.includes.header')

<body class="bg-gray-100">
@include('front.includes.navbar')

<div class="container mx-auto">
    <div class="row">
        @include('front.includes.sidebar')

        <div class="col-md-9 main-content">
            <div class="courses">
                <h4 class="text-gray-600 pb-4">My Courses</h4>
            </div>

            <div class="container row-cols-1">
                <div class="course-card mb-3 relative group">
                    <div class="flex flex-col p-4">


                        @foreach ($courses as $course)
                            <a href="{{ route('courses.details', $course->id) }}"
                               class="course-link1 hover:no-underline">
                                <div
                                    class="course-card mb-3 relative group border p-4 rounded-lg bg-white">
                                    <div class="flex flex-col">
                                        <h5 class="text-gray-500">Module: <span
                                                class="text-blue-600">{{ $course->course_name }}</span></h5>
                                        <h6 class="mb-3 text-gray-500">Lecturer Name: <span
                                                class="text-blue-600">{{ $course->instructor_name }}</span></h6>
                                        <h5 class="text-gray-500">Course Code: <span
                                                class="text-blue-600">{{ $course->course_code }}</span></h5>
                                    </div>
                                    <div
                                        class="absolute inset-0 flex items-center justify-end opacity-0 group-hover:opacity-100 transition-opacity pr-4">
                                            <span class="text-blue-600"><i class="fa fa-eye mr-4"
                                                                           aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </a>
                        @endforeach


                        @if ($courses->isEmpty())
                            <p class="text-gray-500">No courses assigned.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@include('front.includes.footer')
</body>
</html>
