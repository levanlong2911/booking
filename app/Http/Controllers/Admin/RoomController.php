<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room_List;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function addRoom(Request $request)
    {
        if ($request->isMethod('post')) {
            $rooms = new Room_List;
            $rooms->fill($request->all())->save();
            return redirect()->route('room.index');
        }
        return view('admin.room.add');
    }
    public function showEditRoom($id)
    {
        $rooms = Room_List::find($id);
        return view('admin.room.update', compact('rooms'));
    }
    public function roomIndex()
    {
        $rooms = Room_List::all();
        return view('admin.room.index', compact('rooms'));
    }
    public function updateRoom(Request $request, $id)
    {
        $rooms = Room_List::find($id);
        $rooms->name = $request->name;
        $rooms->update();
        return redirect()->route('room.index');
    }
    public function deleteRoom($id)
    {
        $rooms = Room_List::find($id);
        $rooms->delete();
        return redirect()->route('room.index');
    }
}
