<?php

namespace App\Services;

use Exception;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Notifications\NewLesson;
use Illuminate\Support\Facades\Notification;

class CourseLessonService 
{
    public Lesson $lesson;
    
    public function __construct($lesson_id)
    {
        $this->lesson = Lesson::find($lesson_id);
    }

    public function publishedNotification(): bool
    {
        try {

            $lesson = Lesson::find($this->lesson->id);

            $receivers = User::whereHas('coursePurchases', function($q) use ($lesson) {
                $q->where('purchasables.purchasable_id', $lesson->course_id)
                    ->where('purchasables.purchasable_type', Course::class);
            })->get();

            Notification::sendNow($receivers, new NewLesson($lesson));

        } catch (Exception $e) {
            return false;
        }

        return true;
    }
}