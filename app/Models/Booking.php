<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['booked_name','start_date','end_date','price','price_after_discount','status','user_id','room_id'];

    public function rooms()
   {
       return $this->belongsToMany(Room::class,'booking_room','booking_id','room_id');
   }
   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
