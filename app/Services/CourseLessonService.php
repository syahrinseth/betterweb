<?php

namespace App\Services;

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
        $this->lesson = Lesson::findOrFail($lesson_id);
    }

    public function publishedNotification(): bool
    {
        $lesson = $this->lesson;

        $receivers = User::whereHas('coursePurchases', function($q) use ($lesson) {
            $q->where('purchasables.purchasable_id', $lesson->course_id)
                ->where('purchasables.purchasable_type', Course::class);
        })->get();

        Notification::sendNow($receivers, new NewLesson($lesson));

        return true;
    }

    public function markAsComplete(): bool
    {

        if ($this->lesson->completedItems()->where('user_id', auth()->id())->exists()) {
            return false;
        } elseif (empty(auth()->id())) {
            return false;
        }

        $this->lesson->completedItems()
            ->create([
                'exp_earn' => $this->lesson->exp ?? 0,
                'user_id' => auth()->id()
            ]);

        return true;
    }

    public function markAsIncomplete(): bool
    {
        if (!$this->lesson->completedItems()->where('user_id', auth()->id())->exists()) {
            return false;
        } elseif (empty(auth()->id())) {
            return false;
        }

        $this->lesson->completedItems()
            ->where('user_id', auth()->id())
            ->delete();

        return true;
    }
}