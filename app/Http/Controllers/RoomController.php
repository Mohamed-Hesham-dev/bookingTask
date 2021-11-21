<?php

namespace App\Http\Controllers;

use App\Models\BookedRoom;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('/room');
    }

    public function checkroom(Request $request)
    {
        if(Auth::check()){
            $start_date=$request->start_date;
            $end_date=$request->end_date;
            $branch_id=$request->branch_id;
                $book_id=Booking::with('rooms')->where('start_date','>=',$request->start_date)
                ->where('end_date','<=',$request->end_date)
                ->first();
                if($book_id){
                    $rooms=Room::where('branch_id',$request->branch_id)->whereNotIn('id',$book_id->rooms()->pluck('room_id'))->get();
               
                }else{
                    $rooms=Room::where('branch_id',$request->branch_id)->get();
                }
               
                return view('room',compact('rooms','start_date','end_date','branch_id'));
        }
        else{
            return redirect('/login');
        }
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
