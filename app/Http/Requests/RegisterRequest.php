<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:4',
            'confirmPassword'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Tên không được để trống',
            'email.required'=>'Email không được để trống',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu quá ngắn',
            'confirmPassword.required'=>'Không được để trống'
        ];
    }
}
