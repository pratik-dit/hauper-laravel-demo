<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InterestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'principal_amount' => 'required|numeric|min:1',
            'interest_rate' => 'required|numeric|min:1',
            'time_period' => 'required|numeric|min:1',
        ];
    }
}
