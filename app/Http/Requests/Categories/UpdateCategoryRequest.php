<?php

namespace App\Http\Requests\Categories;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateCategoryRequest extends FormRequest
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
            'category_name_en' => [
                'string',
                'min:3',
            'max:255'
            ],
            'category_name_ar' => [
                'string',
                'min:3',
                'max:255'
            ],
        ];
    }

     protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendErrorResponse(null,$validator->errors()->first(),422));
    }
}
