<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'contactNumber' => 'nullable',
            'role' => 'required',
            'status' => 'required',
        ];
    }
}