@include('front.includes.header')
<style>

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }






    .navbar-brand {
        font-size: 20px;
    }


    .lecturer-info {
        text-align: center;
        margin-bottom: 30px;
    }

    /* .book-cards {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: auto;
        gap: 15px;
        padding-bottom: 15px;
    } */

    .book-card {
        flex: 0 0 auto;
        width: 200px;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        background-color: #fff;
    }

    .book-card img {
        max-width: 100%;
        height: auto;
        margin-bottom: 15px;
    }

    .download-button {
        margin-top: 15px;
    }

    .assignment-list {
        list-style: none;
        padding: 0;
    }

    .assignment {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }

    .assignment a {
        text-decoration: none;
        color: #4e4b4b;
    }

    .sidebar form {
        margin-bottom: 20px;
    }

    .list-group-item {
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
    }

    .list-group-item:hover {
        background-color: #e9ecef;
        color: #444141;
    }

    .assignment:hover {
        background-color: #e9ecef;
    }

    .sidebar {
        /*background-color: #e4eaf0;*/
        padding-top: 25px;
        padding: 25px;
    }

    .main-content{
        padding: 55px;
    }

    .btn-color {
        background-color: #074173;
        color: #e9ecef;
    }


    li {
        color: #5c5a5a;
        font-weight: 600;
    }

    /*p {*/
    /*    color: #5c5a5a;*/
    /*    font-weight: 600;*/
    /*    font-size: 19px;*/
    /*}*/

    .clickable-item {
        display: block;
        width: 100%;
        height: 100%;
    }

    .clickable-item:hover {
        background-color: #e9ecef;
    }
    .lec-img{
        padding: 20px;
        color: #074173;
    }
    /* div{
      padding: 10px;
    } */


    /* mainpage ishmael */

    .sidebar {
        /*background-color: #bdd2ec;*/
        /*background-color: gray;*/
        padding: 2%;
    }

    .main-content {
        background-color: #EEEEEE;
        /* Light beige for the main content */
        padding: 1rem;
        /* Add some padding for content */
        min-height: calc(100vh - 56px);
        /* Set minimum height to fill viewport (excluding navbar) */
    }

    .course-card {
        background-color: #fff;
        /* White background for course cards */
        /*padding: 1rem;*/
        border-radius: 25px;
        /* Add rounded corners */
        /*margin-bottom: 1rem;*/
        /* Add some spacing between cards */
        transition: all 0.3s ease-in-out;
        /* Add transition for hover effect */
        /*box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);*/
        /* Subtle shadow for course cards */
    }

    .course-card:hover {
        background-color: #f5f5f5;
        /* Light gray background on hover */
        /*box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);*/
        /*text-underline: none!important;*/
        /* Increase shadow on hover */
    }

    @media (min-width: 992px) {

        /* For large screens (md+) */
        .row-cols-md-2 {
            padding: 1rem;
            /* Add extra padding for larger screens */
        }
    }

    .course-link {
        text-decoration: none;
        color: inherit;
        /* Inherit the color from the parent element */
    }



    .navbar-color {
        /*background-color: #074173;*/
        /*background-color: #393993;*/
        /*padding: 15px;*/
    }

    .nav-link {
        font-size: 18px;
        color: #EEEEEE;
    }



    a {
        font-size: 21px;

    }
    /*.navbar-toggler-icon{*/
    /*    color: white!important;*/
    /*}*/

    span {
        color: #074173;
        font-weight: 600;
    }

    .courses {
        margin-left: 25px;
    }

    /* Animation for course link items (optional) */
    .course-link1 {
        opacity: 0;
        /* Initially hidden */
        animation: fadeIn 0.9s ease-in-out forwards;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }

    }

    /* The side bar content */
    .sidebar {
        text-align: center;
        /* Center the content */

    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar li {
        margin-bottom: 15px;
        font-size: 20px;
        color: #788591;
        font-weight: 500;
    }

    .sidebar a {
        text-decoration: none;
        color: inherit;
    }

    .image-container {
        width: 50%;
        /* Make the container full width */
        height: 30%;
        /* Adjust height automatically based on image aspect ratio */
        margin: 0 auto;

    }

    .image-container img {
        width: 100%;
        /* Make the image full width within the container */
        height: auto;
        /* Maintain aspect ratio */
        object-fit: contain;
        /* Prevent image distortion */
        border-radius: 50%;
        margin-bottom: 25px;
    }

    /* Animation to side bar */
    .image-container img {
        animation: fadeIn 1s ease-in-out;
    }

    .text-container p,
    .text-container ul {
        animation: fadeInUp 1s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Side bar content end */

    /* ... (other existing styles) ... */
    .assignment-status {
        margin-top: 5px;
    }
    .badge-submitted {
        background-color: #28a745; /* Green */
        color: white;
    }
    .badge-not-submitted {
        background-color: #dc3545; /* Red */
        color: white;
    }
</style>
<body class="bg-gray-100">
@include('front.includes.navbar')

<div class="container-fluid">
    <div class="row no-gutters">
        <div class="col-md-4 col-lg-3 sidebar bg-gray-200 mr-md-5 pl-2 pr-2">
            <h4 class="font-mono font-weight-bold">Assignment Submissions</h4>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <ul class="list-group my-assignments">
                @if ($assignments->count() > 0)
                    @foreach ($assignments as $assignment)
                        <li class='list-group-item'>
                            <div>
                                {{ $assignment->file_name }} (Assigned on: {{ $assignment->upload_date }})
                                <a href="{{ Storage::url($assignment->file_path) }}" class="btn btn-link" download>Download</a>
                            </div>

                            <form action="{{ route('assignments.upload', $course->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                                @csrf
                                <input type="file" name="assignment_file[{{ $assignment->id }}]" id="assignment-file-{{ $assignment->id }}" class="form-control mb-3" required>
                                <button type="submit" class="btn btn-color"><i class="fas fa-upload"></i> Upload</button>
                            </form>


                            <div class="assignment-status">
                                @if ($studentUpload->hasSubmission($assignment->id, auth()->id()))
                                    <span class="badge badge-submitted">Submitted</span>
                                @else
                                    <span class="badge badge-not-submitted">Not Submitted</span>
                                @endif
                            </div>
                        </li>
                    @endforeach
                @else
                    <li class='list-group-item'>No assignments available.</li>
                @endif
            </ul>
        </div>

        <div class="col-md-8 col-lg-8 main-content">
            <div class="lecturer-info">
                <i class="fa-solid fa-user lec-img fa-6x"></i>
                <h4 class="font-mono">{{ $course->instructor->name }}</h4>
                <p>Email: {{ $course->instructor->email }}</p>
                <p>Department: Electrical</p>
            </div>
            <h4 class="p-4">Lectures</h4>
            <ul class="list-group">
                @foreach ($resources as $resource)
                    @if ($resource->upload_type === 'lecture')
                        <li class='list-group-item clickable-item' data-file="{{ Storage::url($resource->file_path) }}">
                            {{ $resource->file_name }} (Uploaded on: {{ $resource->upload_date }})
                        </li>

                    @endif
                @endforeach
            </ul>

            <h4 class="mt-2 p-4">Books</h4>
            <ul class="book-list">
                @foreach ($resources as $resource)
                    @if ($resource->upload_type === 'book')
                        <li class='list-group-item clickable-item' data-file="{{ Storage::url($resource->file_path) }}">
                            {{ $resource->file_name }} (Uploaded on: {{ $resource->upload_date }})
                        </li>

                    @endif
                @endforeach
            </ul>
            <h4 class="mt-2 p-4">Submitted Assignments</h4>
{{--            <ul class="assignment-list">--}}
{{--                @if ($submittedAssignments->count() > 0)--}}
{{--                    @foreach ($submittedAssignments as $submission)--}}
{{--                        <li class='assignment'>--}}
{{--                            {{ $submission->file_name }} (Submitted on: {{ $submission->submission_date }})--}}
{{--                            <a href="{{ Storage::url($submission->file) }}" class="btn btn-link" download>Download</a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                @else--}}
{{--                    <li>No assignments submitted yet.</li>--}}
{{--                @endif--}}
{{--            </ul>--}}
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.clickable-item').forEach(item => {
        item.addEventListener('click', () => {
            const file = item.getAttribute('data-file');
            const link = document.createElement('a');
            link.href = file;
            link.download = '';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@include('front.includes.footer')
