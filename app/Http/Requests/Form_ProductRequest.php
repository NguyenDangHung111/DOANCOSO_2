<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class Form_ProductRequest extends FormRequest
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
            'name_product'=> 'required',
            'id_category' => 'gte:1',
            'quantity'=> 'required|integer',
            'long_description'=> 'required',
            'highlight'=> 'required',
            'product_specification'=> 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name_product.required' => 'Tên sản phẩm không được để trống',
            'id_category.gte' => 'Danh mục sản phẩm không được để trống',
            'price.required' => 'Giá sản phẩm không được để trống',
            'quantity.required' => 'Số lượng sản phẩm không được để trống',
            'quantity.integer' => 'Số lượng sản phẩm phải là số nguyên',
            'long_description.required' => 'Mô tả sản phẩm không được để trống',
            'highlight.required' => 'Điểm đặc biệt sản phẩm không được để trống',
            'product_specification.required' => 'Thuộc tính sản phẩm không được để trống',          
        ];
    }

}
