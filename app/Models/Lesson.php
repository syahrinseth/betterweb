<?php

namespace App\Models;

use App\Models\Course;
use App\Models\CompletedItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function scopeOnlyPublished($query)
    {
        return $query->whereNotNull('published');
    }

    public function completedItems(): MorphMany
    {
        return $this->morphMany(CompletedItem::class, 'completable');
    }
}
