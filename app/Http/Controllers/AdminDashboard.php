<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDashboard extends Controller
{
    public function index()
    {
        // Get the total count of students
        $totalStudents = User::where('role', 'student')->count();
        $totalInstructors = User::where('role', 'admin')->count();
        $allResources = Resource::all()->count();
        $allCourses = Course::all()->count();

        // Paginate the list of students (10 per page)

        return view('admin.index', compact('totalStudents', 'allCourses', 'allResources', 'totalInstructors'));
    }

    public function students()
    {
        $students = User::where('role', 'student')->paginate(10);
        return view('admin.students', compact('students'));
    }

    public function add_students()
    {
        return view('admin.addStudent');
    }

    public function store(Request $request)
    {
        // Validate form input
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:users',
            'program' => 'nullable|string|max:255',
            'reg' => 'nullable|string|max:255',
            'year' => 'nullable|string|max:4',
            'description' => 'nullable|string|max:500',
            'password' => 'required|string|min:8|confirmed',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $fileName = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/profile_pictures'), $fileName);
        }

        // Create the user
        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'program' => $request->program,
            'reg' => $request->reg,
            'year' => $request->year,
            'description' => $request->description,
            'password' => Hash::make($request->password),
            'role' => 'student', // Hidden field value
            'picture' => $fileName, // Store the file name or null
        ]);

        // Redirect
        return redirect()->back()->with('success', 'New Student has been registered');
    }

//    delete student
    public function destroy($id)
    {
        // Find the student by ID
        $student = User::find($id);

        // Check if student exists
        if ($student) {
            $student->delete();
            return redirect()->route('students_all')->with('success', 'Student deleted successfully.');
        }

        // If not found
        return redirect()->route('students_all')->with('error', 'Student not found.');
    }

    public function welcome()
    {
        $student_id = auth()->user()->id;

        $courses = DB::table('student_courses as sc')
            ->join('courses as c', 'sc.course_id', '=', 'c.id')
            ->join('instructors as i', 'c.instructor_id', '=', 'i.id')
            ->select('c.id', 'c.course_name', 'c.course_code', 'i.name as instructor_name')
            ->where('sc.student_id', $student_id)
            ->get();

        return view('student.welcome', compact('courses'));
    }


//    courses




}
