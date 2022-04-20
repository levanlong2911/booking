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
            'name' => 'required|min:6|max:30',
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
            'gender' => 'required|in:Male,Female,Other',
            'phone' => ['required', 'digits:10'],
            'position' => 'required',
            'department' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập họ và tên',
            'name.min' => 'Vui lòng nhập họ và tên ít nhất 6 ký tự',
            'name.max' => 'Vui lòng nhập họ và tên nhiều nhất 30 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập email đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Vui lòng nhập password ít nhất 8 ký tự',
            'password.max' => 'Vui lòng nhập password nhiều nhất 20 ký tự',
            'gender.required' => 'Vui lòng chọn giới tính',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'position.required' => 'Vui lòng nhập chức vụ',
            'department.required' => 'Vui lòng nhập phòng ban'
        ];
    }
}
