<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',
        'program',    // Add this
        'phone',      // Add this
        'email',
        'picture',
        'reg',        // Add this
        'year',       // Add this
        'description',// Add this
        'password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function resources()
    {
        return $this->hasMany(Resource::class, 'instructor_id');
    }

    public function enrolledCourses()
    {
        return $this->belongsToMany(Course::class, 'student_courses', 'student_id', 'course_id')
            ->withPivot('assigned_at');
    }

    public function isInstructor()
    {
        return $this->role === 'admin';
    }

    public function isStudent()
    {
        return $this->role === 'student';
    }


}
