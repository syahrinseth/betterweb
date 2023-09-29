<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{

    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->paragraph();
        return [
            'title' => $title,
            'slug' => Course::kebabCase($title),
            'published' => now(),
            'user_id' => User::factory(),
            'description' => fake()->paragraph()
        ];
    }
}
