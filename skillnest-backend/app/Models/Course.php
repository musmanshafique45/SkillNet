<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $casts = [
        'tags' => 'array',
    ];
}
