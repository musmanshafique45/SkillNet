<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'student_id', 'course_id', 'progress',
        'completed_lectures', 'last_lecture', 'completed', 'enrolled_at',
    ];

    protected $casts = [
        'completed_lectures' => 'array',
        'completed' => 'boolean',
        'progress' => 'integer',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
