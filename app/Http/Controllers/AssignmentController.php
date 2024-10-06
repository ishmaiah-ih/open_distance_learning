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
//    public function uploadAssignment(Request $request, $courseId)
//    {
//        $user = auth()->user();
//
//        // Validate the request
//        $request->validate([
//            'assignment_file.*' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:5000',
//        ]);
//
//        // Fetch the course to get the instructor
//        $course = Course::findOrFail($courseId);
//        $instructorId = $course->instructor_id; // Assuming you have this relationship set
//
//        foreach ($request->file('assignment_file') as $assignmentId => $file) {
//            // Generate a unique filename
//            $filename = time() . '_' . $file->getClientOriginalName();
//
//            // Store the file
//            $path = $file->storeAs('assignments', $filename, 'public');
//
//            // Create a new entry in the student_uploads table
//            StudentUpload::create([
//                'student_id' => $user->id,
//                'instructor_id' => $instructorId, // Set the instructor ID here
//                'resource_id' => $courseId,
//                'assignment_title' => $file->getClientOriginalName(),
//                'file' => $path,
//                'upload_date' => now(),
//            ]);
//        }
//
//        return redirect()->back()->with('success', 'Assignments uploaded successfully!');
//    }

    public function uploadAssignment(Request $request, $courseId)
    {
        $user = auth()->user();

        // Validate the request
        $request->validate([
            'assignment_file.*' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:5000',
        ]);

        // Fetch the course to get the instructor
        $course = Course::findOrFail($courseId);
        $instructorId = $course->instructor_id; // Assuming you have this relationship set

        // Get all resources associated with the course
        $resources = Resource::where('course_id', $courseId)
            ->where('upload_type', 'assignment')
            ->get();

        foreach ($resources as $resource) {
            // Check if there is a corresponding file upload
            if (isset($request->file('assignment_file')[$resource->id])) {
                $file = $request->file('assignment_file')[$resource->id];

                // Generate a unique filename
                $filename = time() . '_' . $file->getClientOriginalName();

                // Store the file
                $path = $file->storeAs('assignments', $filename, 'public');

                // Create a new entry in the student_uploads table
                StudentUpload::create([
                    'student_id' => $user->id,
                    'instructor_id' => $instructorId,
                    'resource_id' => $resource->id, // Link to the specific resource
                    'assignment_title' => $file->getClientOriginalName(),
                    'file' => $path,
                    'upload_date' => now(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Assignments uploaded successfully!');
    }

    private function getInstructorIdForCourse($courseId)
    {
        // Logic to get the instructor ID for the given course ID
        $course = Course::find($courseId);
        return $course ? $course->instructor_id : null;
    }


//    public function viewAssignments()
//    {
//        1
    // Get the logged-in instructor's ID
//        $instructorId = auth()->id();
//
//        // Get all courses taught by the instructor
//        $courses = Course::where('instructor_id', $instructorId)->pluck('id');
//
//        // Get all assignments submitted for the instructor's courses
//        $submissions = StudentUpload::whereIn('resource_id', $courses)
//            ->with('user') // Assuming 'user' is the relationship to the Student model
//            ->get();
//
//        return view('admin.assignments', compact('submissions'));

//        2
//        $submissions = StudentUpload::with('user')->where('instructor_id', auth()->user()->id)->get();
//
//        return view('admin.assignments', compact('submissions'));
//    }

//    public function viewAssignments()
//    {
//        $submissions = StudentUpload::with(['user', 'course']) // Eager load user and course
//        ->where('instructor_id', auth()->id()) // Adjust as needed
//        ->get();
//
//        return view('admin.assignments', compact('submissions'));
//    }

    public function viewAssignments()
    {
        // Fetch submissions with related user and course
        $submissions = StudentUpload::with(['user', 'course'])
            ->where('instructor_id', auth()->id()) // Adjust as needed
            ->get();

        // Assuming each submission has a course_id; if not, adjust accordingly
        $courseId = $submissions->isNotEmpty() ? $submissions->first()->course_id : null;

        return view('admin.assignments', compact('submissions', 'courseId'));
    }





}
