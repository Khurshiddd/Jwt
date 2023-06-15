<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProductStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'produc_category_id'=>'required|integer',
            'title' => 'required|min:5|max:255|string',
            'body' => 'required|string',
            'price' => 'required|integer',
            'deteils' => 'nullable|array'
        ];
    }
    public function failedValidation(Validator $validator)

    {

        throw new HttpResponseException(response()->json([

            'success'   => false,

            'message'   => 'Validation errors',

            'data'      => $validator->errors()

        ], 422));

    }
    public function messages()
    {
        return [
            'message' => 'Iltimos malumotlarni to\'g\'ri to\'ldiring',
        ];
    }


}
