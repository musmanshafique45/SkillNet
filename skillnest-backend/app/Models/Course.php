<?php
<<<<<<< HEAD

=======
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
<<<<<<< HEAD
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
=======
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
    ];
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2
}
