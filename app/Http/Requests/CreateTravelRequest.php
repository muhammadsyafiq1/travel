<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTravelRequest extends FormRequest
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
            'title' => 'max:100|required',
            'price' => 'integer|required',
            'food' => 'max:20|required',
            'featured_event' => 'max:50|required',
            'price' => 'integer|required',
            'food' => 'max:20|required',
        ];
    }
}
