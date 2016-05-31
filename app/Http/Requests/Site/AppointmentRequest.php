<?php

namespace App\Http\Requests\Site;

use App\Http\Requests\Request;

class AppointmentRequest extends Request
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
            'subdivision' => 'required|exists:timetable',
            'specialization' => 'required|exists:timetable',
            'name' => 'required|exists:timetable',
            'apport' => 'required',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|',
            'comment' => 'required',
        ];
    }
}
