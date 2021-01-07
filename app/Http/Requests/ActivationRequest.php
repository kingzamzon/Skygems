<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActivationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'payment_type' => 'required',
            'status' => 'required',
            'transaction_ref' => 'required|unique:activations,transaction_ref',
            'exam_type' => 'required',
            'imei_no' => 'required|unique:activations,imei_no'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'user_id.required' => 'User field is empty.',
            'user_id.exists' => 'User is invalid.',
            'payment_type.required' => 'payment_type field is empty(online, recharge card).',
            'status.required' => 'status field is empty e.g active, expired',
            'transaction_ref.required' => 'transaction_ref field is empty.',
            'transaction_ref.unique' => 'transaction_ref has already used.',
            'exam_type.required' => 'exam_type field is empty e.g Neco, Jamb.',
            'imei_no.required' => 'imei_no field is empty.',
            'imei_no.unique' => 'imei_no has already used.',
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
