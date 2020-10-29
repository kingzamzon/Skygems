<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterTutorRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'nullable|max:255|email',
            'phone' => 'required|min:10|unique:users,phone',
            'username' => 'required|max:255|alpha_num|unique:users,username',
            'password' => 'required|min:8'
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
            'name.required' => 'Full name field is empty.',
            'email.unique' => 'Email already exist.',
            'email.email' => 'Email is invalid.',
            'email.max' => 'Email field is should not be more than 225 characters',
            'phone.required' => 'Phone field is empty.',
            'phone.unique' => 'Phone already used.',
            'phone.max' => 'Phone field is should not be more than 25 characters',
            'username.required' => 'Username field is empty.',
            'username.unique' => 'Username already exist.',
            'username.max' => 'Username field is should not be more than 225 characters',
            'password.required' => 'Password field is empty.',
            'password.min' => 'Password should not be less than 8 characters',
            'password.confirmed' => 'Passwords do not match.',
            'username.alpha_num' => 'username can only accept alpha-numeric characters'
        ];
    }
}
