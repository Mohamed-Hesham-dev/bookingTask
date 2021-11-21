<?php

namespace App\Http\Requests\API\Room;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequestStore extends FormRequest
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
            'room_number'=>'required|string|unique:rooms',
           'price'=>'required',
           'type'=>'required',
           'details'=>'required',
           'branch_id'=>'required|integer|exists:branches,id'
        ];
    }
}
