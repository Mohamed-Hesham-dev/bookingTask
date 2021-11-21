<?php

namespace App\Http\Resources\API\Booking;

use App\Http\Resources\API\Room\RoomResource;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'booked_name'=>$this->booked_name,
            'start_date'=>$this->start_date,
            'end_date'=>$this->end_date,
            'price'=>$this->price,
            'status'=>$this->status,
            'user'=>$this->user,
            'room'=>new RoomResource($this->room)
        ];
    }
}
