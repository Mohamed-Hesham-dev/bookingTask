<?php

namespace App\Http\Requests\API\Booking;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequestUpdate extends FormRequest
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
        return [
            'booked_name'=>'required|string',
            'user_id'=>'required|integer|exists:users,id',
            'room_id'=>'required|integer|exists:rooms,id',
            'start_date'=>'required',
            'end_date'=>'required',
            'price'=>'required',
            'status'=>'required',
        ];
    }
}
