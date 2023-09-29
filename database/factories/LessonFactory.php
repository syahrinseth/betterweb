<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $course_id = Course::factory();
        return [
            'course_id' => $course_id,
            'title' => fake()->name(),
            'order' => Lesson::generateOrderNumber($course_id),
            'published' => now(),
            'meta_data' => [
                'video' => [
                    'length' => '4m 28sec'
                ]
            ]
        ];
    }
}
