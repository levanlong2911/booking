<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;

class DepartmentController extends Controller
{
    public function showAddDepartment()
    {
        return view('admin.department.add');
    }
    public function addDepartment(DepartmentRequest $request)
    {
        $departments = new Department;
        $departments->fill($request->all())->save();
        return redirect()->route('department.index')->with('message', 'Thêm phòng ban thành công');
    }
    public function departmentIndex()
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $departments = Department::where('name', 'LIKE', "%$search%");
        }
        $departments = Department::paginate(2);
        return view('admin.department.index', compact('departments','search'));
    }
    public function showEditDepartment($id)
    {
        $departments = Department::find($id);
        return view('admin.department.update', compact('departments'));
    }
    public function updateDepartment(DepartmentRequest $request, $id)
    {
        $departments = Department::find($id);
        $departments->fill($request->all())->update();
        return redirect()->route('department.index')->with('message', 'Cập nhật phòng ban thành công');
    }
    public function deleteDepartment($id)
    {
        $departments = Department::find($id);
        $departments->delete();
        return redirect()->route('department.index')->with('delete', 'Xoá phòng ban thành công');
    }
}
