<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'title'        => $this->title,
            'description'  => $this->description,
            'priority'     => $this->priority,
            'status'       => $this->status,
            'tags'         => $this->tags,
            'developer_id' => $this->developer_id,
            'developer'    => $this->when(
                $this->relationLoaded('developer') && $this->developer,
                fn() => [
                    'id'     => $this->developer->id,
                    'name'   => $this->developer->name,
                    'status' => $this->developer->status,
                ],
            ),
        ];
    }
}
