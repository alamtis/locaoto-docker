<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrandModelRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'brand_id' => 'required|integer|exists:brands,id',
        ];
    }
}
