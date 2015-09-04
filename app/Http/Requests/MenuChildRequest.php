<?php namespace App\Http\Requests;

use Auth;

class MenuChildRequest extends Request
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
            'id' => 'sometimes|integer|required',
            'name' => 'sometimes|required|max:255',
            'url' => 'required|max:255',
            'order' => 'integer',
            'menuid' => 'sometimes|required|integer',

        ];
    }

}
