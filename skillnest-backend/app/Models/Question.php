<?php
<<<<<<< HEAD

=======
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
<<<<<<< HEAD
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'quiz_id', 'type', 'question_text', 'options', 'correct_answer'
    ];
=======
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2

    protected $casts = [
        'options' => 'array',
    ];
<<<<<<< HEAD

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
=======
>>>>>>> 6d4dc02ce3f47b7ee111da156a08237db462f4d2
}
