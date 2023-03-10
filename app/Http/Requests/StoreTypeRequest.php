<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:types,name|min:5|max:100'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Il titolo é obbligatorio',
            'name.min' => 'Il titolo deve avere minimo :min caratteri',
            'name.max' => 'Il titolo deve avere massimo :max caratteri'
        ];
    }
}
