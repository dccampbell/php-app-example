<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /** Get the validation rules that apply to the request. */
    public function rules(): array
    {
        return [
            'email'  => 'required|email',
            'name'   => 'required|string',
            'street' => 'required|string',
            'city'   => 'required|string',
            'state'  => 'required|alpha|max:2',
            'zip'    => 'required|alpha_dash|max:10',
        ];
    }
}
