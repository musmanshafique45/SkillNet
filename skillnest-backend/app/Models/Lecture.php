<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id', 'course_id', 'title', 'duration', 'order_index', 'description', 'video_url',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
