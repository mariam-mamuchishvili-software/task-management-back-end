<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DeveloperResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'     => $this->id,
            'name'   => $this->name,
            'status' => $this->status,
            'tasks'  => $this->when(
                $this->relationLoaded('tasks'),
                fn() => $this->tasks->map(fn($t) => [
                    'id'          => $t->id,
                    'title'       => $t->title,
                    'description' => $t->description,
                    'priority'    => $t->priority,
                    'status'      => $t->status,
                    'tags'        => $t->tags,
                ])->values(),
            ),
        ];
    }
}
