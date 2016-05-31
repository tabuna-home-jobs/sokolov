<?php

namespace App\Http\Requests;

class ExamplesRequest extends Request
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
            'id' => 'integer',
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'text' => 'required',
            'block_id' => 'required|integer',
            'tag' => 'max:255',
            'descript' => 'max:255',
            'avatar' => 'mimes:jpeg,bmp,png',
            'icon' => 'mimes:jpeg,bmp,png',
            'category' => 'integer',
        ];
    }
}
