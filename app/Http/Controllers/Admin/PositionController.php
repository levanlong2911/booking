<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Requests\PositionRequest;

class PositionController extends Controller
{
    public function showAddPosition(){
        return view('admin.position.add');
    }
    public function addPosition(PositionRequest $request)
    {
            $positions = new Position;
            $positions->fill($request->all())->save();
            return redirect()->route('position.index')->with('message', 'Thêm chức vụ thành công');
    }
    public function positionIndex()
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $positions = Position::where('name', 'LIKE', "%$search%");
        }
        $positions = Position::paginate(2);
        return view('admin.position.index', compact('positions','search'));
    }
    public function showEditPosition($id)
    {
        $positions = Position::find($id);
        return view('admin.position.update', compact('positions'));
    }
    public function updatePosition(PositionRequest $request, $id)
    {
        $positions = Position::find($id);
        $positions->name = $request->name;
        $positions->update();
        return redirect()->route('position.index')->with('message', 'Cập nhật chức vụ thành công');
    }
    public function deletePosition($id)
    {
        $positions = Position::find($id);
        $positions->delete();
        return redirect()->route('position.index')->with('delete', 'Xoá chức vụ thành công');
    }
}
