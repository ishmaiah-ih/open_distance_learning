<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['course_name', 'course_code', 'instructor_id'];

    // Each course belongs to one instructor
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'student_courses')->withPivot('assigned_at');
    }
    public function uploads()
    {
        return $this->hasMany(StudentUpload::class, 'resource_id'); // Assuming resource_id is the foreign key
    }



}
