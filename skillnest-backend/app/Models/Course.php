<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'teacher_id', 'title', 'description', 'thumbnail',
        'category', 'level', 'price', 'status', 'rating', 'students',
        'tags', 'created_at_custom',
    ];

    protected $casts = [
        'tags' => 'array',
        'price' => 'float',
        'rating' => 'float',
        'students' => 'integer',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class)->orderBy('order_index');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
