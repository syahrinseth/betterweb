<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'author' => $this->author,
            'slug' => $this->slug,
            'published' => $this->published,
            'medias' => $this->getMedia()->toArray(),
            'lessons' => $this->lessons,
            'tags' => $this->tags,
            'description' => $this->description,
            'premium' => $this->premium,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
