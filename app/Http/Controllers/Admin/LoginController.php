<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Form\AdminCustomValidator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $login = $request->only('email', 'password', 'remember');
            if (Auth::guard('admin')->attempt($login, $request->remember))
            {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('login')->with('fail', 'Email hoặc password nhập sai');
            }
        }
        return view('admin.login.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
