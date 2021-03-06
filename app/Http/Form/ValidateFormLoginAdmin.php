<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ValidateFormLoginAdmin
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|max:20'
        ],[
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập email đúng định dạng',
            'email.exists' => 'Email không tồn tại',
            'password.required' => 'Vui lòng nhập password',
            'password.min' => 'Vui lòng nhập password ít nhất 6 ký tự',
            'password.max' => 'Vui lòng nhập password nhiều nhất 20 ký tự'
        ]);
       
        return $validator->validate();
    }
}