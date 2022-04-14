<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    
    public function __construct( AdminCustomValidator $form)
    {
        $this->form = $form;
    }
    public function loginUser(Request $request)
    {
        if($request->isMethod)
        {

            $this->$request->validate('ValidateFormLogin');
            $loginUser = $request->only('email', 'password');
            dd($loginUser);
            if(Auth::attempt($loginUser, $request->remember))
            {
                return redirect()->route('home.book');
            } else {
                return redirect()->route('login')->with('fail', 'Email hoặc password nhập sai');
            }
        }
        return view('booking.login.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
