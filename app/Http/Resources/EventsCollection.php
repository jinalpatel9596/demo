<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EventsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->map(function ($event) {
            return [
                'id' => $event->id,
                'name' => $event->name,
                'place' => $event->place,
                'start_date' => $event->start_date,
                'end_date' => $event->end_date
            ];
        });
    }

    public function with($request)
    {
        return [
            'success' => true
        ];
    }
}
