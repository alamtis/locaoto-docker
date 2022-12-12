<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'brand' => ['required', 'integer', 'exists:brands,id'],
            'model' => ['required', 'integer', 'exists:brand_models,id'],
            'fuel' => ['required', 'string', 'in:essence,diesel,hybride,electrique'],
            'transmission' => ['required', 'string', 'in:manuelle,automatique'],
            'doors' => ['required', 'integer', 'min:2', 'max:4'],
            'passangers' => ['required', 'integer', 'min:2', 'max:5'],
            'air_conditioning' => ['required', 'boolean'],
            'identity' => ['required', 'string', 'max:255'],
        ];
    }
}
