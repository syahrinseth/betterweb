<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_merge(parent::toArray($request), [
            'previous_lesson' => $this->previousLesson(),
            'next_lesson' => $this->nextLesson(),
            'completed' => $this->completedItems?->first() ? true : false,
            'section' => $this->section
        ]);
    }
}
