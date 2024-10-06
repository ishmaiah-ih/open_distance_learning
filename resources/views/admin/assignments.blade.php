@extends('admin.common')
@section('title', 'All Submitted Assignments | E-HUB')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Submitted Assignments
                        @include('admin.includes.flash')
                    </h4>
                </div>

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Assignment Title</th>
                        <th>Uploaded By</th>
                        <th>Course</th>
                        <th>Upload Date</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($submissions as $submission)
                        <tr>
                            <td>{{ Str::limit($submission->assignment_title, 15) }}</td> <!-- Truncate title to 30 characters -->
                            <td>{{ $submission->user->name }}</td>
                            <td>{{ optional($submission->course)->course_name ?? 'No Course' }}</td> <!-- Accessing the course name -->
                            <td>{{ $submission->created_at->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <a href="{{ Storage::url($submission->file) }}" target="_blank" class="btn btn-sm btn-info" title="View File">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>

                            <td>
                                @php
                                    $fileExtension = pathinfo($submission->file, PATHINFO_EXTENSION);
                                @endphp

                                @if ($fileExtension === 'doc' || $fileExtension === 'docx')
                                    <a href="https://view.officeapps.live.com/op/view.aspx?src={{ urlencode(Storage::url($submission->file)) }}" target="_blank" class="btn btn-sm btn-info" title="View File">
                                        <i class="fas fa-eye"></i> View Doc
                                    </a>
                                @elseif ($fileExtension === 'pdf')
                                    <a href="{{ Storage::url($submission->file) }}" target="_blank" class="btn btn-sm btn-info" title="View File">
                                        <i class="fas fa-eye"></i> View PDF
                                    </a>
                                @else
                                    <a href="{{ Storage::url($submission->file) }}" class="btn btn-link" download title="Download">
                                        <i class="fas fa-download"></i> Download
                                    </a>
                                @endif
                            </td>


                            <td>
                                <a href="{{ Storage::url($submission->file) }}" download class="btn btn-sm btn-success" title="Download">
                                    <i class="fas fa-download"></i> <!-- Download icon -->
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if($submissions->isEmpty())
                    <p>No assignments have been submitted yet.</p>
                @endif

            </div>
        </div>
    </div>

@endsection

