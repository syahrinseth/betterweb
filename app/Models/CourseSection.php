<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function completedItems(): MorphMany
    {
        return $this->morphMany(CompletedItem::class, 'completable');
    }
}
