<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuRequest extends FormRequest
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
            'name' => 'required|string|min:5|max:100|unique:bus',
            'price' => 'required|string|min:2|max:20',
            'rooms' => 'required|integer' ,
            'rent'=>'required|integer',
            'square' => 'required|string|min:2|max:10',
            'type'=>'required|integer',
            //'small_desc'=> 'required|string|min:5|max:160',
            'meta' => 'required|string|min:5|max:200',
            'longitude'=>'required|string|min:2|max:50',
            'latitude'=>'required|string|min:2|max:50',
            'large_desc'=>'required|string|min:5',
            'status'=>'required|integer',
            'place'=>'required',
            'image'=>'mimes:jpeg,bmp,png,jpg',
        ];
    }
}
