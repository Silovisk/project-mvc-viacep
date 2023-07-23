<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class SalvarRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'InputZip' => 'required|string',
            'InputAddress' => 'required|string',
            'InputDistrict' => 'required|string',
            'InputCity' => 'required|string',
            'InputState' => 'required|string',
        ];
    }
}
