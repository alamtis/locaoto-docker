<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgencyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email|unique:agencies,email',
            'location_id' => 'required|string',
            'password' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg|max:1024',
        ];
    }
}
