<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CustomerRequest extends FormRequest
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
            'firstName' => 'required|max:45',
            'surname' => 'required|max:45',
            'phone' => 'required|max:45',
            'national_id' => 'required|numeric',
            'date_of_birth' => 'required|date',
            'agent_id' => 'required|max:45|exists:agents,id'
        ];
    }
}
