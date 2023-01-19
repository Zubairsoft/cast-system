<?php

namespace App\Http\Requests\Dashboard\Companies\Music;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class UpdateMusicRequest extends FormRequest
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
            'title_ar' => [
                'sometimes',
                'min:4',
                'max:200',
                'regex:/^[\-_ \d\p{Arabic}]*\p{Arabic}[\d\p{Arabic}]*$/ui',

            ],
            'title_en' => [
                'sometimes',
                'min:4',
                'max:200',
                'regex:/^[a-zA-Z0-9 ]+$/',
            ],
            'description_ar' => [
                'nullable',
                'min:10',
                'max:255',
                'regex:/^[\-_ \d\p{Arabic}]*\p{Arabic}[\d\p{Arabic}]*$/ui',
            ],
            'description_en' => [
                'nullable',
                'min:10',
                'max:255',
                'regex:/^[a-zA-Z0-9 ]+$/',
            ],
            'music' => [
                'nullable',
                File::types(['mp3', 'mp4'])->max(10 * 1024)
            ],
            'album' => [
                'sometimes',
                Rule::exists('albums', 'id')->where('creator_id', $this->user()->id)
            ],
            'is_active' => [
                'nullable',
                'boolean',
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendErrorResponse(null, $validator->errors()->first(), 422));
    }
}
