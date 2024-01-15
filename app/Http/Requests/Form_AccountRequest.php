<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class Form_AccountRequest extends FormRequest
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
            'image'=>'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fullname'=>'required',
            'function'=>'required|string',
            'gender'=>'required',
            'phone'=>'required',
            'city'=>'required|gt:0',
            'district'=>'required|gt:0',
            'ward'=>'required|gt:0',
           'email'=>'required|email|string|unique:account,email|max:255',
           'password1'=>'required|string|min:6',
           'password2'=>'required|string|same:password1',
           'address_house'=>'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required'=> 'Bạn Chưa Nhập Họ Tên !',
            'function.required'=> 'Bạn Chưa Chọn Quyền Cho Tài Khoản Này !',
            'gender.required'=> 'Bạn Chưa Chọn Giới Tính !',
            'phone.required'=> 'Bạn Chưa Nhập SĐT !',
            'city.required'=> 'Bạn Chưa Chọn Thành Phố !',
            'district.required'=> 'Bạn Chưa Chọn Quận/Huyện !',
            'ward.required'=> 'Bạn Chưa Chọn Phường/Xã !',
            'email.unique'=> 'Email Đã Tồn Tại !',
            'email.required'=> 'Bạn Chưa Nhập Email !',
            'email.email'=>'Email Không Đúng Định Dạng',
            'email.max'=>'Email Tối Đa 255 Kí Tự',
            'password1.required'=>'Bạn Chưa Nhập Mật Khẩu !',
            'password1.min'=>'Mật Khẩu Ít Nhất Phải Bằng 6 Kí Tự !',
            'password2.required'=>'Bạn Chưa Nhập Lại Mật Khẩu !',
            'password2.same'=>'Mật Khẩu Không Khớp Hãy Kiểm tra lại !',
            'image.mimes'=>'File Không Đúng Định Dạng ! Chọn Ảnh...',
            'image.max'=>'File Không Đúng Định Dạng ! Chọn Ảnh...',
            'address_house.required'=>'Bạn Chưa Nhập Tổ/Xóm !',
        ];
    }
}
