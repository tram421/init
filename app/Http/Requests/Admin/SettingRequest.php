<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => 'unique:pages|required',
            'slug' => 'unique:pages'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên Danh Mục',
            'name.unique' => 'Bị trùng tên, vui lòng chọn tên khác',
            'slug.unique' => 'Bị trùng slug, vui lòng chọn tên khác'
        ];
    }
}
