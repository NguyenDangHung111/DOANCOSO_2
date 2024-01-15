<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Register_Request extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           'fullname'=>'required',
           'email2'=>'required|email|unique:account,email|max:255',
           'password2'=>'required',
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required'=> 'Bạn Chưa Nhập Họ Tên !',
            'email2.required'=> 'Bạn Chưa Nhập Email !',
            'email2.email'=>'Email Không Đúng Định Dạng !',
            'email2.unique'=>'Email Đã Đăng Kí !',
            'password2.required'=>'Bạn Chưa Nhập Mật Khẩu !',

        ];
    }
}
