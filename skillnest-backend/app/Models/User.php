<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

<<<<<<< HEAD
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'name', 'email', 'password', 'role', 'avatar', 'bio', 'status',
    ];

    protected $hidden = ['password', 'remember_token'];
=======
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'student_id');
    }

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class, 'student_id');
    }
}
