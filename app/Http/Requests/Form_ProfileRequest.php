<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class Form_ProfileRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [             
            'image.mimes'=>'File Không Đúng Định Dạng ! Chọn Ảnh...',
            'image.max'=>'File Không Đúng Định Dạng ! Chọn Ảnh...',         
        ];
    }
}
