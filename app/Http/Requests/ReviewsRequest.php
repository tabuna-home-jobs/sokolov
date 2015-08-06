<?php namespace App\Http\Requests;

use Sentry;


class ReviewsRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        return Sentry::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'fio' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|boolean',
		];
	}

}
