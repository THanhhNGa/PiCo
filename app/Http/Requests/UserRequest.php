<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required|min:5',
            'name'=>'required|min:2|max:60',
            'phone'=>'required|max:11',
            'address'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được để trống!',
            'email.email'=>'Email không đúng định dạng!',
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu không được ít hơn 5 kí tự!',
            'name.required'=>'Tên tài khoản không được để trống!',
            'name.min'=>'Tên tài khoản không được ít hơn 2 kí tự!',
            'name.max'=>'Tên tài khoản không được nhiều hơn 60 kí tự!',
            'phone.required'=>'Số điện thoại không được để trống!',
            // 'phone.tel'=>'Số điện thoại không đúng định dạng!',
            'phone.max'=>'Số điện thoại không được quá 11 số!',
            'address.required'=>'Địa chỉ không được để trống!',
        ];
    }
}
