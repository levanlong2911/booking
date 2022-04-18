<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function addDepartment(Request $request)
    {
        if ($request->isMethod('post')) {
            $departments = new Department;
            $departments->fill($request->all())->save();
            return redirect()->route('department.index');
        }
        return view('admin.department.add');
    }
    public function showEditDepartment($id)
    {
        $departments = Department::find($id);
        return view('admin.department.update', compact('departments'));
    }
    public function departmentIndex()
    {
        $departments = Department::all();
        return view('admin.department.index', compact('departments'));
    }
    public function updateDepartment(Request $request, $id)
    {
        $departments = Department::find($id);
        $departments->name = $request->name;
        $departments->update();
        return redirect()->route('department.index');
    }
    public function deleteDepartment($id)
    {
        $departments = Department::find($id);
        $departments->delete();
        return redirect()->route('department.index');
    }
}
