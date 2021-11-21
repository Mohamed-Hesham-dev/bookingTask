<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\API\Room\RoomRequestStore;
use App\Http\Requests\API\Room\RoomRequestUpdate;
use App\Http\Resources\API\Room\RoomResource;
use App\Models\Room;

class RoomController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Room::get();
         
        return $this->sendResponse(RoomResource::collection($list), ' retrieved successfully.');

    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequestStore $request)
    {
        $room = Room::create($request->validated());
        return $this->sendResponse(new RoomResource($room), 'created successfully.');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequestUpdate $request, Room $room)
    {
        $room->update($request->validated());
        return $this->sendResponse(new RoomResource($room), 'updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return $this->sendResponse('deleted', 'deleted successfully.');
    }
}
