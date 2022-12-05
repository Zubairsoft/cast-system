<?php

namespace App\Http\Requests\Dashboard\Companies\Albums;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreAlbumRequest extends FormRequest
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
            'album_name_en' => [
                'required',
                'min:3',
                'max:255',
            ],
            'album_name_en' => [
                'required',
                'min:3',
                'max:255',
            ],
            'is_active' => [
                'boolean'
            ],
            'category' => [
                'required',
                Rule::exists('categories', 'id')
            ]

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendErrorResponse(null, $validator->errors()->first(), 422));
    }
}
