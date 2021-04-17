<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrailRequest extends FormRequest
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
            'customer_id' => 'required|numeric',
            'trail_to'    => 'required|string',
            'flying_from' => 'required|string',
            'total_cost'  => 'required|numeric'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_id.required' => 'Customer id is required',
            'trail_to.required' => 'Trail to is required',
            'flying_from.required' => 'Flying from is required',
            'total_cost.required' => 'Total cost is required',
        ];
    }
}
