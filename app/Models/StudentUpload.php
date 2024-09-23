<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentUpload extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'instructor_id', 'assignment_title', 'file', 'upload_date'];


    public
    function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function resource()
    {
        return $this->belongsTo(Resource::class);
    }

    public function hasSubmission($assignmentId, $studentId)
    {
        return self::where('resource_id', $assignmentId)
            ->where('student_id', $studentId)
            ->exists();
    }


}
