<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->merge(['password' => Hash::make($request->input('password'))]);
            $user = new User;
            $user->fill($request->all())->save();
            return redirect()->route('admin.index');
        }
        return view('admin.user.add');
    }

    // public function editUser($id, Request $request)
    // {
    //     $users = User::find($id);
    //     if($request->isMethod('post')){
    //         $users = new User();
    //         $users->fill($request->all());
    //         if($users->save()){
    //             return redirect()->route('admin.index');
    //         } else {
    //             return redirect()->back();
    //         }
    //     }
    //     return view('admin.user.index', compact('users'));
    // }
    public function showEditUser($id)
    {
        $users = User::find($id);
        return view('admin.user.update', compact('users'));
    }
    public function userIndex()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function updateUser(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->gender = $request->gender;
        $users->phone = $request->phone;
        $users->position = $request->position;
        $users->department = $request->department;
        $users->update();

        return redirect()->route('admin.index');
    }
    public function deleteUser($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('admin.index');
    }
}
