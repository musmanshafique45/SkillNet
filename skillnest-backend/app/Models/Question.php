<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $casts = [
        'options' => 'array',
    ];
}
