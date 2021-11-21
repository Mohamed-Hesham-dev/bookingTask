<?php

namespace App\Http\Requests\API\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequestUpdate extends FormRequest
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
            'name'=>'required|string|unique:hotels,name,'.$this->hotel->id
           
        ];

    }
}
