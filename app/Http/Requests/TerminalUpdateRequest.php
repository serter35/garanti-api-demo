<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rules\Password;

class TerminalUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'merchant_id' => ['required', 'integer'],
            'provision_user_id' => ['required', 'string'],
            'provision_user_password' => ['nullable', Password::min(8)->mixedCase()],
            'terminal_id' => ['required', 'integer'],
            'store_key' => ['required', 'string'],
        ];
    }
}
