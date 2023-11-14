<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $age = date("Y-m-d", time() + 86400);
        return [
            'age' => 'before:' . $age,
            'phone' => 'bail|digits_between:10,11',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:64',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Tên không được để trống'),
            'name.max' => __('Tên không được vượt quá 255 kí tự'),
            'email.required' => __('Hòm thư không được để trống'),
            'email.email' => __('Hòm thư không đúng định dạng'),
            'email.max' => __('Hòm thư không được vượt quá 255 kí tự'),
            'email.unique' => __('Hòm thư đã tồn tại'),
            'password.required' => __('Mật khẩu không được để trống'),
            'password.string' => __('Mật khẩu không đúng định dạng'),
            'password.min' => __('Mật khẩu tối thiểu trên 8 kí tự'),
            'password.max' => __('Mật khẩu không vượt quá 64 kí tự'),
            'image.image' => __('Hình ảnh phải là dạng ảnh'),
            'image.mimes' => __('Hình ảnh không đúng định dạng'),
            'image.max' => __('Kích thước ảnh vượt quá 2048px'),
            'age.before' => __('Ngày sinh không được sau ngày hiện tại'),
        ];
    }
}