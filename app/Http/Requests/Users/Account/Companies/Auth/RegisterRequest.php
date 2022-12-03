<?php

namespace App\Http\Requests\Users\Account\Companies\Auth;

use Domains\Companies\Enums\AccountType;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3'
            ],
            'username' => [
                'required',
                'string',
                'max:255',
                'min:3', Rule::unique('users', 'username')
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],
            'avatar' => [
                'nullable',
                File::types(['png', 'jpeg', 'jpg'])->max(1024)
            ],
            'password' => [
                'required',
                'min:4',
                'confirmed'
            ],
            'company_name' => [
                'required',
                'min:3',
                'max:255'
            ],
            'address' => [
                'required',
                'min:3',
            ],
            'license_document' => [
                'required',
                File::types(['jpg', 'pdf', 'jpeg'])->max(1024),
            ],
            'account_type' => [
                'required',
                Rule::in([AccountType::FREE, AccountType::PAYMENT])
            ],

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendErrorResponse(null, $validator->errors()->first(), 422));
    }
}
