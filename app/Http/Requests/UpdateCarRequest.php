<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'brand_model_id' => ['required', 'integer', 'exists:brand_models,id'],
            'identity' => ['required', 'string', 'max:255'],
            'image' => ['image', 'max:1024', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }
}
