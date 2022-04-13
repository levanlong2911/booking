<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showAddUser()
    {
        return view('admin.user.add_users');
    }
    public function addUser(Request $request)
    {
        $password = Hash::make('password');
        $user = new Users;
        $user->fill($request->all())->save();
        return redirect()->route('get.admin.index');
    }
    public function showEditUser($id)
    {
        $users = Users::find($id);
        return view('admin.user.update_users', compact('users'));
    }
    public function userIndex()
    {
        $users = Users::all();
        $data = compact('users');
        return view('admin.index')->with($data);
    }
    public function EditUser(Request $request, $id)
    {
        $users = Users::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->gender = $request->gender;
        $users->phone = $request->phone;
        $users->position = $request->position;
        $users->department = $request->department;
        $users->update();
        return redirect()->route('get.admin.index');
    }
    public function deleteUser($id)
    {
        $admin = Users::find($id);
        $admin->delete();
        return redirect()->route('get.admin.index');
    }
}
