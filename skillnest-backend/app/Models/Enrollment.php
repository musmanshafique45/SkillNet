<?php
<<<<<<< HEAD

=======
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
<<<<<<< HEAD
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'student_id', 'course_id', 'progress',
        'completed_lectures', 'last_lecture', 'completed', 'enrolled_at',
    ];
=======
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2

    protected $casts = [
        'completed_lectures' => 'array',
        'completed' => 'boolean',
<<<<<<< HEAD
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
=======
    ];
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2
}
