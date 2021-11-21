<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\API\Booking\BookingRequestStore;
use App\Http\Requests\API\Booking\BookingRequestUpdate;
use App\Http\Resources\API\Booking\BookingResource;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Booking::get();
         
        return $this->sendResponse(BookingResource::collection($list), ' retrieved successfully.');

    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingRequestStore $request)
    {
        foreach($request->room_id as $room){
            $exiest = Booking::where('room_id',$room)
            ->where('start_date',$request->start_date)
            ->where('end_date',$request->end_date)
            ->first();
            if(!$exiest){
                $booking = Booking::create(array_merge($request->validated(),['user_id'=>Auth::user()->id,'room_id'=>$room]));
            
            }
           
        }
        $booking = Booking::whereIn('room_id',$request->room_id)->get();
        return $this->sendResponse (BookingResource::collection($booking), 'created successfully.');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookingRequestUpdate $request, Booking $booking)
    {
       
        $exiest = Booking::where('room_id',$booking->room_id)
        ->where('start_date',$booking->start_date)
        ->where('end_date',$booking->end_date)
        ->where('id','!=',$booking->id)
        ->first();
      
        if(!$exiest){
            $booking->update($request->validated());
        }
        
        return $this->sendResponse(new BookingResource($booking), 'updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return $this->sendResponse('deleted', 'deleted successfully.');
    }
}
