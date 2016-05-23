<?php

namespace app\Http\Requests;

use Auth;

class SharesRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
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
            'content' => 'required',
            'tag' => 'max:255',
            'descript' => 'max:255',
            'lang' => 'required',
        ];
    }
}
