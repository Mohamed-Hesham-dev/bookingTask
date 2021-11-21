<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Hotel\HotelRequestStore;
use App\Http\Resources\API\Hotel\HotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\API\Hotel\HotelRequestUpdate;

class HotelController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Hotel::get();
         
        return $this->sendResponse(HotelResource::collection($list), ' retrieved successfully.');

    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequestStore $request)
    {
        $hotel = Hotel::create($request->validated());
        return $this->sendResponse(new HotelResource($hotel), 'created successfully.');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequestUpdate $request, Hotel $hotel)
    {
     
        $hotel->update($request->validated());
        return $this->sendResponse(new HotelResource($hotel), 'updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return $this->sendResponse('deleted', 'deleted successfully.');
    }
}
