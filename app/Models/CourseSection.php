<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSection extends Model
{
    use HasFactory;

    protected $table = 'course_sections';

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('order');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
