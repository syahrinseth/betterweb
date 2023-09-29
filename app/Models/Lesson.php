<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $casts = [
        'meta_data' => 'array',
    ];

    public static function generateOrderNumber($course_id)
    {
        return static::where('course_id', $course_id)->count();
    }
}
