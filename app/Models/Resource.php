<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Resource extends Model
{
    protected $fillable = ['instructor_id', 'course_id', 'upload_type', 'file_name', 'file_path'];

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    // Resource.php
//    public function course()
//    {
//        return $this->belongsTo(Course::class, 'course_id');
//    }

}
