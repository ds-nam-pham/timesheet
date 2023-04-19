<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Nhập mật khẩu cũ',
            'new_password.required' => 'Nhập mật khẩu mới',
            'new_password.confirmed' => 'Mật khẩu mới không trùng khớp'
        ];
    }
}
