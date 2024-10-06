@include('front.includes.header')
<style>

    .video-name {
        display: -webkit-box; /* For Chrome, Safari */
        display: -moz-box; /* For Firefox */
        /*display: box; !* For IE *!*/
        -webkit-box-orient: vertical; /* For Chrome, Safari */
        -moz-box-orient: vertical; /* For Firefox */
        /*box-orient: vertical; !* For IE *!*/
        overflow: hidden;
        -webkit-line-clamp: 2; /* Limit to 2 lines */
        line-clamp: 2; /* Limit to 2 lines */
        color: #333; /* Text color */
    }

    /* Card styling for video */
    .video-card {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .video-card h5 {
        margin-bottom: 10px;
        font-size: 18px;
        color: #074173;
    }

    .video-card video {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .icon {
        font-size: 24px;
        margin-right: 10px;
    }

    /* Styles for icons */
    .book-icon, .lecture-icon, .audio-icon, .video-icon {
        font-size: 24px;
        color: #074173;
        margin-right: 10px;
    }

    /* Styling audio cards */
    .audio-card {
        border: 1px solid #ccc;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .audio-card audio {
        width: 100%;
        margin-bottom: 10px;
    }

    /* General layout improvements */
    .lecturer-info {
        text-align: center;
        margin-bottom: 30px;
    }

    .assignment-status {
        margin-top: 5px;
    }

    .badge-submitted {
        background-color: #28a745;
        color: white;
    }

    .badge-not-submitted {
        background-color: #dc3545;
        color: white;
    }
</style>

<body class="bg-gray-100">
@include('front.includes.navbar')

<div class="container-fluid">
    <div class="row mt-4">
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

            <h4 class="p-4"><i class="lecture-icon fa fa-chalkboard"></i>Course Lectures</h4>
            <ul class="list-group">
                @foreach ($resources as $resource)
                    @if ($resource->upload_type === 'lecture')
                        <li class='list-group-item clickable-item' data-file="{{ Storage::url($resource->file_path) }}">
                            {{ $resource->file_name }} (Uploaded on: {{ $resource->upload_date }})
                        </li>
                    @endif
                @endforeach
            </ul>

            <h4 class="mt-2 p-4"><i class="book-icon fa fa-book"></i>Course Books</h4>
            <ul class="list-group">
                @foreach ($resources as $resource)
                    @if ($resource->upload_type === 'book')
                        <li class='list-group-item clickable-item' data-file="{{ Storage::url($resource->file_path) }}">
                            {{ $resource->file_name }} (Uploaded on: {{ $resource->upload_date }})
                        </li>
                    @endif
                @endforeach
            </ul>

            <h4 class="mt-2 p-4"><i class="audio-icon fa fa-headphones"></i>Course Audios</h4>
            <div class="audio-list">
                @foreach ($resources as $resource)
                    @if ($resource->upload_type === 'audio')
                        <div class="audio-card">
                            <h5>{{ $resource->file_name }}</h5>
                            <audio controls>
                                <source src="{{ Storage::url($resource->file_path) }}" type="audio/mpeg">
                                Your browser does not support the audio tag.
                            </audio>
                            <a href="{{ Storage::url($resource->file_path) }}" download>Download</a>
                        </div>
                    @endif
                @endforeach
            </div>

            <h4 class="mt-2 p-4"><i class="video-icon fa fa-video"></i>Course Videos</h4>
            <div class="row">
                @foreach ($resources as $resource)
                    @if ($resource->upload_type === 'video')
                        <div class="col-md-4">
                            <div class="video-card">
                                <h5 class="video-name">{{ $resource->file_name }}</h5>
                                <video controls>
                                    <source src="{{ Storage::url($resource->file_path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <a href="{{ Storage::url($resource->file_path) }}" download>Download</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
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
