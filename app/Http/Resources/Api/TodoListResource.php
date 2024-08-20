<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return 
        [
            'type' => 'Todo List',
            'id' => $this->id,
            'attributes' => 
            [
                'title' => $this->title,
                'description' => $this->description,
                $this->mergeWhen($request->routeIs('todolist.show'),
                [
                    'timestamps' => [
                        'created_at' => $this->created_at->format('Y-m-d H:i:A'),
                        'updated_at' => $this->updated_at->format('Y-m-d H:i:A')
                    ]
                ]),
                'status' => $this->completed === 0 ? 'Pending' : 'Completed',
            ],
            'link' => 
            [
                'self' => route('todolist.show', $this->id)
            ] 
        ];
    }
}
