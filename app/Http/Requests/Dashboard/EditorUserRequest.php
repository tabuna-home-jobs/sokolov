<?php

namespace App\Http\Requests\Dashboard;

use App\Http\Requests\Request;
use Auth;

class EditorUserRequest extends Request
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'phone' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'sometimes|confirmed|min:6',
            'password_confirmation' => 'sometimes'

        ];
    }
}
