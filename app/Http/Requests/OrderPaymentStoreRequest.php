<?php

namespace App\Http\Requests;

use App\Entities\Payment\Garanti\CreditCard;
use App\Rules\LuhnCheck;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class OrderPaymentStoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $this->merge([
            'Number' => Str::replace(' ', '', $this->request->get('Number')),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'CardHolderName' => ['required', 'string', 'max:255', 'min:5'],
            'Number' => ['required', 'string', 'digits_between:15,19', new LuhnCheck],
            'ExpireDate' => ['required', 'date_format:m/y'],
            'CVV2' => ['required', 'string', 'digits_between:3,4'],
        ];
    }

    public function toCreditCardEntity(): CreditCard
    {
        [$ExpireMonth, $ExpireYear] = explode('/', $this->request->get('ExpireDate'));

        return new CreditCard(
            $this->input('Number'),
            $this->input('CardHolderName'),
            $ExpireYear,
            $ExpireMonth,
            $this->input('CVV2')
        );
    }
}
