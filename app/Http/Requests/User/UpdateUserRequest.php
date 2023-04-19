<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'. request()->id,
            'password'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'password.required' => 'password không được bỏ trống',
            'email.unique' => 'Email đã tồn tại',
            'name.max' => 'Bạn nhập quá ký tự',
            'email.max' => 'Bạn nhập quá ký tự'
        ];
    }
}
