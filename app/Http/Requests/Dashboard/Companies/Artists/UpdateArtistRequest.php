<?php

namespace App\Http\Requests\Dashboard\Companies\Artists;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\File;

class UpdateArtistRequest extends FormRequest
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
            'artist_name_ar' => [
                'nullable',
                'string',
                'regex:/^[\-_ \d\p{Arabic}]*\p{Arabic}[\d\p{Arabic}]*$/ui',
                'min:4',
                'max:255'
            ],
            'artist_name_en' => [
                'nullable',
                'string',
                'regex:/^[a-zA-Z0-9 ]+$/',
                'min:4',
                'max:255',
            ],
            'date_of_birth' => [
                'nullable',
                'date',
            ],
            'country' => [
                'nullable',
                'string',
                'min:4',
                'max:255',
            ],
            'image' => [
                'nullable',
                File::types(['jpg', 'png', 'jpeg'])->max(1024),
            ]
            ];
    }

     protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendErrorResponse(null,$validator->errors()->first(),422));
    }
}
