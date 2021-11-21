<?php

namespace App\Http\Requests\API\Branch;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequestUpdate extends FormRequest
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
            'id'=>'exists:branches,id',
            'name'=>'required|string|unique:branches,name,'.$this->branch->id,
            'hotel_id'=>'required|integer|exists:hotels,id'
        ];
    }
}
