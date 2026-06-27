<?php
<<<<<<< HEAD

=======
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
<<<<<<< HEAD
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'course_id', 'title', 'time_limit', 'max_attempts'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
=======
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2
}
