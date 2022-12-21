<?php

namespace App\Http\Requests\Dashboard\Admin\Categories;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class StoreCategoryRequest extends FormRequest
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
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'category_name_ar' => [
                'required',
                'string',
                'min:3',
                'max:255'
            ],
            'logo' => [
                'nullable',
                File::types(['png', 'jpg', 'jpeg'])->max(1024),
            ],
            'status' => [
                'nullable',
                Rule::in([true, false, 'on', 'off', 'yes', 'no', 1, 0])
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendErrorResponse(null, $validator->errors()->first(), 422));
    }
}
