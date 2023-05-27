<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockMarketRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_symbol' => 'required',
            'start_date' => 'required|date|before_or_equal:end_date|before_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date|before_or_equal:today',
            'email' => 'required|email',
        ];
    }
}
