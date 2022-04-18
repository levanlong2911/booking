<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function addPosition(Request $request)
    {
        if ($request->isMethod('post')) {
            $positions = new Position;
            $positions->fill($request->all())->save();
            return redirect()->route('position.index');
        }
        return view('admin.position.add');
    }
    public function showEditPosition($id)
    {
        $positions = Position::find($id);
        return view('admin.position.update', compact('positions'));
    }
    public function positionIndex()
    {
        $positions = Position::all();
        return view('admin.position.index', compact('positions'));
    }
    public function updatePosition(Request $request, $id)
    {
        $positions = Position::find($id);
        $positions->name = $request->name;
        $positions->update();
        return redirect()->route('position.index');
    }
    public function deletePosition($id)
    {
        $positions = Position::find($id);
        $positions->delete();
        return redirect()->route('position.index');
    }
}
