<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    public function showAddUser()
    {
        $positions = Position::all();
        $departments = Department::all();
        return view('admin.user.add', compact('positions','departments'));
    }
    public function addUser(UserRequest $request)
    {

        $request->merge(['password' => Hash::make($request->input('password'))]);
        $user = new User;
        $user->fill($request->all())->save();
        return redirect()->route('user.index',compact('departments'))->with('message', 'Thêm người dùng thành công');
    }
    public function userIndex(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $users = User::where('name', 'LIKE', "%$search%")
                ->orWhere('email', 'LIKE', "$search")
                ->orWhere('gender', 'LIKE', "$search")
                ->orWhere('position', 'LIKE', "%$search%")
                ->orWhere('department', 'LIKE', "%$search%")
                ->get();
        } else {
            $users = User::paginate(4);
        }
        return view('admin.user.index',compact('users', 'search'));
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
        return redirect()->route('user.index')->with('delete', 'Xoá người dùng thành công');
    }
}
