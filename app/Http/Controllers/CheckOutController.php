<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id=Auth::user()->id;
        $data = Booking::with('rooms')->where('user_id',$user_id)->where('status','pending')->first();
        $old_data=Booking::with('rooms')->where('user_id',$user_id)->where('status','confirmed')->first();
        if($old_data){
            $discount = 95;
        }else{
            $discount = 0;
        }
        return view('checkout',compact('data','discount'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeCheckout(Request $request)
    {
        
        $user_id=Auth::user()->id;
       $old_data=Booking::with('rooms')->where('user_id',$user_id)->where('status','confirmed')->first();
       if($old_data){
           $discount = 0.95;
       }else{
           $discount = 0;
       }
        $total_price = 0;
       // dd($request->rooms);
        foreach($request->rooms as $room){
           
                $room = Room::find($room['room_id']);
                
                $total_price +=  $room->price;
        }
        $datetime1 = date_create($request->end_date);
        $datetime2 = date_create($request->start_date);
     
        $total_day=date_diff($datetime2,$datetime1)->format('%a');
        $price = $total_price  * $total_day;
        $data=[
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            
            'price'=>$total_price  * $total_day,
            'price_after_discount'=>$price -($price *  $discount) ,
            
        ];
        
  
        $booking=Booking::UpdateOrCreate(['user_id'=>Auth::user()->id,'status'=>'pending'],$data);
       
            $booking->rooms()->sync($request->rooms);
           
        return redirect('/checkout');
    }
     public function store(Request $request)
    {
        $booking=Booking::find($request->id);
        $booking->status='confirmed';
        $booking->save();
       return redirect('/');

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
