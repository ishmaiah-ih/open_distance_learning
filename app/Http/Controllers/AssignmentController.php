<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Resource;

// Make sure to import the Resource model
use App\Models\StudentUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AssignmentController extends Controller
{
    public function uploadAssignment(Request $request, $courseId)
    {
        $user = auth()->user();

        // Validate the request
        $request->validate([
            'assignment_file.*' => 'required|file|mimes:pdf,doc,docx|max:2048', // Adjust file types and size as needed
        ]);

        // Fetch the course to get the instructor
        $course = Course::findOrFail($courseId);
        $instructorId = $course->instructor_id; // Assuming you have this relationship set

        foreach ($request->file('assignment_file') as $assignmentId => $file) {
            // Generate a unique filename
            $filename = time() . '_' . $file->getClientOriginalName();

            // Store the file
            $path = $file->storeAs('assignments', $filename, 'public');

            // Create a new entry in the student_uploads table
            StudentUpload::create([
                'student_id' => $user->id,
                'instructor_id' => $instructorId, // Set the instructor ID here
                'resource_id' => $assignmentId,
                'assignment_title' => $file->getClientOriginalName(),
                'file' => $path,
                'upload_date' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Assignments uploaded successfully!');
    }


    private function getInstructorIdForCourse($courseId)
    {
        // Logic to get the instructor ID for the given course ID
        $course = Course::find($courseId);
        return $course ? $course->instructor_id : null;
    }
}
