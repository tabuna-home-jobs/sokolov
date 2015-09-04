<?php

namespace App\Http\Requests;

use App\Models\Order;
use Auth;

class CommentsSiteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        //Проверям может ли пользователь комментировать запись
        $Order = Order::select('user_id', 'userwork_id')->findOrFail($this->beglouto);
        return $Order->user_id == Auth::user()->id || $Order->userwork_id == Auth::user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'text' => 'required',
            'beglouto' => 'required|integer',

        ];
    }
}
