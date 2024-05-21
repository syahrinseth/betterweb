<?php

namespace App\Notifications;

use App\Models\Lesson;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewLesson extends Notification
{
    use Queueable;

    public Lesson $lesson;

    /**
     * Create a new notification instance.
     */
    public function __construct(Lesson $lesson)
    {
        $this->lesson = $lesson;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Pelajaran baru kini tersedia di Kelas Betterweb')
                    ->greeting('Assalamulaikum dan Salam Sejahtera,')
                    ->line('Pelajaran baru "' . $this->lesson->title . '" dalam Siris "' . $this->lesson->course->title . '" telah tersedia, klik butang di bawah untuk mula belajar.
                    ')
                    ->action('Mula Belajar', route('kelas.course.lesson.show', [ 'slug' => $this->lesson->course->slug, 'id' => $this->lesson->id ]))
                    ->line('Terima Kasih!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title' => $this->lesson->title,
            'origin_id' => $this->lesson->id,
            'origin_type' => Lesson::class
        ];
    }
}
