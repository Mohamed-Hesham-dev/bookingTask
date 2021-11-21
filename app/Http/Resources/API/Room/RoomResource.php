<?php

namespace App\Http\Resources\API\Room;

use App\Http\Resources\API\Branch\BranchResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'room_number'=>$this->room_number,
            'details'=>$this->details,
            'price'=>$this->price,
            'type'=>$this->type,
            'branch'=> new BranchResource($this->branch)
            
        ];
    }
}
