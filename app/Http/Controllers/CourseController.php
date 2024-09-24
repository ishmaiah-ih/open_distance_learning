<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        // Fetch all courses along with instructor names where role is admin
        $courses = DB::table('courses')
            ->join('users', 'courses.instructor_id', '=', 'users.id')
            ->select('courses.*', 'users.name as instructor_name')
            ->where('users.role', 'admin')
            ->get();

        // Pass the courses to the view
        return view('admin.courses', compact('courses'));
    }
    public function create()
    {
        // Fetch instructors from users table where role is admin
        $instructors = DB::table('users')->where('role', 'admin')->get();
        return view('admin.add_course', compact('instructors'));
//        return view('admin.add_course');


    }

    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|max:255',
            'instructor_id' => 'required|exists:users,id',
        ]);

        // Store the new course
        DB::table('courses')->insert([
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'instructor_id' => $request->instructor_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Course added successfully.');
    }

    public function edit($id)
    {
        $course = DB::table('courses')->find($id);
        $instructors = DB::table('users')->where('role', 'admin')->get();

        return view('admin.courses-edit', compact('course', 'instructors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|max:255',
            'instructor_id' => 'required|exists:users,id',
        ]);

        // Update the course
        DB::table('courses')->where('id', $id)->update([
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'instructor_id' => $request->instructor_id,
            'updated_at' => now(),
        ]);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function delete($id)
    {
        DB::table('courses')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Course deleted successfully.');
    }

}
