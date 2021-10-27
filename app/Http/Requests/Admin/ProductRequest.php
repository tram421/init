<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\PriceSaleRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
class ProductRequest extends FormRequest
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
            'price_sale' => [
                'numeric',
                new PriceSaleRule($this->input('price'))
            ],
            'price' => 'numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'price_sale.numeric' => 'Giá giảm phải là số không đươc là chữ',
            'price.numeric' => 'Giá gốc phải là số không đươc là chữ'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Session::flash('data', $this->request->all());
//        Session::flash('error', 'Lỗi');
        #nếu lỗi từ trang add product thì lưu dữ liệu đang nhập vào session rồi load trở lại
        if (substr($this->getRedirectUrl(), -3) == 'add') {

            throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->route('add-product'));
        }
        #Nếu lỗi từ đường dẫn khác thì chỉ cần load lại
        throw (new ValidationException($validator))
            ->errorBag($this->errorBag)
            ->redirectTo($this->getRedirectUrl());

    }

}
