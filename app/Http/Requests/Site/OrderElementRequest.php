<?php

namespace app\Http\Requests\Site;

use App\Http\Requests\Request;
use Auth;

class OrderElementRequest extends Request
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
            'price' => 'numeric|required',
            'status' => 'required',
            'workfinish' => 'date|required',
        ];
    }
}
