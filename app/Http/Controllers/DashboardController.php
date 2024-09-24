<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\StudentUpload;
use Illuminate\Support\Facades\DB;

use App\Models\Resource;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
//        $user = auth()->user();
//        if ($user->isInstructor()) {
//            return redirect()->route('/')->with('error', 'Access denied: Instructors cannot view this page.');
//        }
        // Fetch the logged-in student's ID
        $student_id = auth()->user()->id;

        // Retrieve courses assigned to the student through the pivot table (student_courses)
        $courses = DB::table('courses as c')
            ->join('student_courses as sc', 'c.id', '=', 'sc.course_id')
            ->join('users as i', 'c.instructor_id', '=', 'i.id') // Join with instructors table
            ->select('c.id', 'c.course_name', 'c.course_code', 'i.name as instructor_name', 'sc.assigned_at')
            ->where('sc.student_id', '=', $student_id) // Filter based on logged-in student
            ->get();

        // Pass the retrieved courses to the view
        return view('front.homepage', compact('courses'));
    }


//course details
    public function show($id)
    {
//        $user = auth()->user();

        // Redirect instructors away from student-specific pages
//        if ($user->isInstructor()) {
//            return redirect()->route('/')->with('error', 'Access denied: Instructors cannot view this page.');
//        }

        // Fetch the course using the $id from the URL or request
        $course = Course::with('instructor')->findOrFail($id);

        // Fetch all resources related to the course
        $resources = Resource::where('course_id', $course->id)->get();

        // Fetch assignments related to the course
        $assignments = Resource::where('course_id', $course->id)->where('upload_type', 'assignment')->get();

        // Assuming StudentUpload is a service or model that handles student submissions
        $studentUpload = new StudentUpload(); // Adjust this based on your actual implementation

        // Pass course, resources, assignments, and studentUpload to the view
        return view('front.course_details', compact('course', 'resources', 'assignments', 'studentUpload'));
    }



}
