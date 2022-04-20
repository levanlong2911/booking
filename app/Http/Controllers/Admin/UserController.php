<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showAddUser()
    {
        return view('admin.user.add');
    }
    public function addUser(UserRequest $request)
    {
            $request->merge(['password' => Hash::make($request->input('password'))]);
            $user = new User;
            $user->fill($request->all())->save();
            return redirect()->route('user.index')->with('message', 'Thêm người dùng thành công');
    }
    public function userIndex()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function showEditUser($id)
    {
        $users = User::find($id);
        return view('admin.user.update', compact('users'));
    }
    public function updateUser(UserRequest $request, $id)
    {
        $users = User::find($id);
        $request->merge(['password' => Hash::make($request->input('password'))]);
        $users->fill($request->all())->update();
        return redirect()->route('user.index')->with('message', 'Cập nhật người dùng thành công');
    }
    public function deleteUser($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->route('user.index');
    }
}
