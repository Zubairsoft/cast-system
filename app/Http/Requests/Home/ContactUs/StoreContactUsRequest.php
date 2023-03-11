<?php

namespace App\Http\Requests\Home\ContactUs;

use App\Models\ContactList;
use App\Rules\ExistsInJson;
use Closure;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\isNull;

class StoreContactUsRequest extends FormRequest
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
            'sender' => [
                'required',
                'min:4',
            ],
            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'integer',
                'min:9'
            ],
            'contact_list_id' => [
                'required',
                Rule::exists('contact_lists', 'id')
            ],
            'message' => [
                'required',
                'min:4',
                'max:255',
            ],
            'problem' => [
                'nullable',
                new ExistsInJson('contact_lists','problem',$this->contact_list_id)
                // function (string $attribute, mixed $value, Closure $fail) {
                //     $contactList = ContactList::query()->find($this->contact_list_id);
                //     $problems = is_array(json_decode($contactList->problem))?json_decode($contactList->problem):[];
                //     if (!array_key_exists($value, $problems) &&  !is_null($value)) {
                //         $fail('validation.exists');
                //     }
               // },
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(sendErrorResponse(null, $validator->errors()->first(), 422));
    }
}
