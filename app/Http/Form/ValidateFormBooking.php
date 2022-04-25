<?php

namespace App\Http\Form;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ValidateFormBooking
{
    /**
     * validate
     *
     * @param \Illuminate\Http\Request $request
     */
  
    public function validate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:8|max:32',
            'date' => 'required',
            'amount_of_people' => 'required',
            'time_start' => 'required',
            'time_end' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập nội dung',
            'title.min' => 'Vui lòng nhập nội dung ít nhất 8 ký tự',
            'title.max' => 'Vui lòng nhập nội dung nhiều nhất 32 ký tự',
            'date.required' => 'Vui lòng chọn ngày',
            'amount_of_people.required' => 'Vui lòng chọn số người tham gia',
            'time_start.required' => 'Vui lòng chọn thời gian bắt đầu',
            'time_end.required' => 'Vui lòng chọn thời gian kết thúc',
        ]);
        return $validator->validate();
    }
}