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
        return redirect()->route('department.index');
    }
    public function departmentIndex()
    {
        $departments = Department::all();
        return view('admin.department.index', compact('departments'));
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
        return redirect()->route('department.index');
    }
    public function deleteDepartment($id)
    {
        $departments = Department::find($id);
        $departments->delete();
        return redirect()->route('department.index');
    }
}
