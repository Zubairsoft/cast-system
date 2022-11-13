<?php

namespace App\Http\Requests\Users\Account\Password;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ForgetPasswordRequest extends FormRequest
{

    /**
     * @return [type]
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return [type]
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::exists('users', 'email'),
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendErrorResponse(null,$validator->errors()->first(),422));
    }


}
