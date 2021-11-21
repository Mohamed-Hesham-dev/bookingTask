<?php

namespace App\Http\Requests\API\Booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequestStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->room_id);
     //  dd($this->room_id) ;
        return [
            'booked_name'=>'required|string',
            'user_id'=>'required|integer|exists:users,id',
            'start_date'=>'required',
            'end_date'=>'required',
            'price'=>'required',
            'status'=>'required',
            'room_id' => 'required|array',
            'room_id.*'=>'integer|exists:rooms,id',
            
        ];
    }
}
