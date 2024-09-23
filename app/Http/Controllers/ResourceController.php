<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResourceController extends Controller
{

    public function resources()
    {
        $resources = Resource::with('course')->where('instructor_id', Auth::id())->paginate(10); // Paginate as needed

        return view('admin.resources', compact('resources'));
    }

    public function resourcesAdd()
    {
        $courses = Course::where('instructor_id', Auth::id())->get();

        return view('admin.addResource', compact('courses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'upload_type' => 'required|string',
            'file_path' => 'required|file|mimes:pdf,doc,docx,jpg,png', // Add allowed file types as necessary
        ]);

        // Store the uploaded file and get the path
        $filePath = $request->file('file_path')->store('resources', 'public');

        // Get the original file name
        $originalFileName = $request->file('file_path')->getClientOriginalName();

        // Create the resource
        Resource::create([
            'instructor_id' => Auth::id(),
            'course_id' => $request->course_id,
            'upload_type' => $request->upload_type,
            'file_name' => $originalFileName, // Store the original file name
            'file_path' => $filePath,
            'upload_date' => now(),
        ]);

        return redirect()->route('resources.all')->with('success', 'Resource added successfully!');
    }


    public function edit($id)
    {
        $resource = Resource::findOrFail($id);
        return view('resources.edit', compact('resource'));
    }

    public function destroy($id)
    {
        // Find the resource by ID
        $resource = Resource::find($id);

        // Check if resource exists
        if ($resource) {
            $resource->delete();
            return redirect()->route('resources.all')->with('success', 'Resource deleted successfully.');
        }

        // If not found
        return redirect()->route('resources.all')->with('error', 'Resource not found.');
    }
}
