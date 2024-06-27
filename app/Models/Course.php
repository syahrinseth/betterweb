<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['*'];

    protected $casts = [
        'published' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_course', 'course_id', 'tag_id');
    }

    public function sections()
    {
        return $this->hasMany(CourseSection::class);
    }

    public function toKebabCase($title = null) {
        $words = explode(" ", $title ?? $this->title);
        $kebabWords = array_map('strtolower', $words);
        return implode("-", $kebabWords);
    }

    public static function kebabCase($string)
    {
        return (new Course())->toKebabCase($string);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    public function purchasers()
    {
        return $this->morphToMany(User::class, 'purchasable');
    }

    public function completedItems(): MorphMany
    {
        return $this->morphMany(CompletedItem::class, 'completable');
    }
}
