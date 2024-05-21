<?php

namespace App\Console\Commands;

use App\Services\CourseLessonService;
use Illuminate\Console\Command;

class NewLessonNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:new-lesson-notification {lesson}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification for new published lesson.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $lesson_id = $this->argument('lesson');

        $lessonService = new CourseLessonService($lesson_id);

        if (empty($lessonService->lesson)) {
            $this->error('Lesson is not available.');
            return;
        }

        $lessonService->publishedNotification();
        
        $this->info('The command was successful!');
    }
}
