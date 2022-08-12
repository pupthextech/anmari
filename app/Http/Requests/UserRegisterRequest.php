<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ServerStatus;
use Illuminate\Validation\Rules\Enum;

class UserRegisterRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile_num' => 'required|regex:^(09)\\d{9}^',
            'email' => 'required|email',
            'address' => 'required',
            'username' => 'bail|required|max:50|unique:users,username',
            'password' => 'required',
            'gender' => 'required|in:male,female',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'First name is required',
            'mobile_num.required' => 'Mobile number is required',
            'mobile_num.regex' => 'Mobile number is not a valid Philippine mobile number',
            'email.required' => 'E-mail address is required',
            'email.email' => 'E-mail address is not a valid e-mail address',
            'address.required' => 'Address is required',
            'username.bail' => 'Username is required',
            'username.required' => 'Username is required',
            'username.max' => 'Username exceeded max number of characters',
            'username.unique' => 'Username is invalid',
            'password.required' => 'Password is required',
            'gender.required' => 'Gender is required',
            'gender.in' => 'Please choose a gender',
        ];
    }
}