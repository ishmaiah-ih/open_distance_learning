<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentCourseController extends Controller
{
    public function index()
    {
        // Retrieve the student courses along with student names and course names
        $studentCourses = DB::table('student_courses')
            ->join('users', 'student_courses.student_id', '=', 'users.id')
            ->join('courses', 'student_courses.course_id', '=', 'courses.id')
            ->select('student_courses.*', 'users.name as student_name', 'courses.course_name as course_name')
            ->where('users.role', 'student') // Ensure we only fetch users with the role of student
            ->paginate(10);  // Paginate results to 10 per page

        // Pass the paginated data to the view
        return view('admin.student_courses', compact('studentCourses'));
    }

    public function create()
    {
        // Fetch students where role is 'student'
        $students = DB::table('users')->where('role', 'student')->get();

        // Fetch all courses
        $courses = DB::table('courses')->get();

        // Pass students and courses to the view
        return view('admin.add_student_course', compact('students', 'courses'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'student_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        // Store the student-course relation
        DB::table('student_courses')->insert([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id,
            'assigned_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Student added to the course successfully.');
    }


    public function destroy($id)
    {
        // Find the student course record by ID
        $studentCourse = DB::table('student_courses')->where('id', $id);

        // Check if the record exists before trying to delete it
        if ($studentCourse) {
            $studentCourse->delete();

            // Return back with a success message
            return redirect()->back()->with('success', 'Student course record deleted successfully.');
        }

        // Return back with an error message if the record was not found
        return redirect()->back()->with('error', 'Student course record not found.');
    }


}
