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
            return redirect()->route('position.index');
    }
    public function positionIndex()
    {
        $positions = Position::all();
        return view('admin.position.index', compact('positions'));
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
        return redirect()->route('position.index');
    }
    public function deletePosition($id)
    {
        $positions = Position::find($id);
        $positions->delete();
        return redirect()->route('position.index');
    }
}
