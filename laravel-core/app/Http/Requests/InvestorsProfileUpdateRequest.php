<?php

namespace App\Http\Requests;

use App\Models\Investor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvestorsProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Investor::class)->ignore($this->user()->id)],
            'role' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'picture' => ['nullable'],
        ];
    }
}
