<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecompleteRequest extends FormRequest
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
            'book_id' => 'required',
            'stop_id' => 'required',
            'user_id' => 'required',
        ];
    }
}
