<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    : array{
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'position'    => $this->position,
            'column_id'   => $this->column_id,
            'created_by'  => new UserResource(User::find($this->created_by)),
            'assigned_to' => new UserResource(User::find($this->assigned_to)),
            'followers'   => UserResource::collection($this->whenLoaded('followers')),
            'due_date'    => $this->due_date,
            'created_at'  => $this->created_at,
            'updated_at'  => $this->updated_at,
        ];
    }
}
