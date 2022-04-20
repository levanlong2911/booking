<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room_List;
use App\Http\Requests\RoomRequest;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function showAddRoom()
    {
        return view('admin.room.add');
    }
    public function addRoom(RoomRequest $request)
    {
        $rooms = new Room_List;
        $rooms->fill($request->all())->save();
        return redirect()->route('room.index');
    }
    public function roomIndex()
    {
        $rooms = Room_List::all();
        return view('admin.room.index', compact('rooms'));
    }
    public function showEditRoom($id)
    {
        $rooms = Room_List::find($id);
        return view('admin.room.update', compact('rooms'));
    }
    public function updateRoom(RoomRequest $request, $id)
    {
        $rooms = Room_List::find($id);
        $rooms->fill($request->all())->update();
        return redirect()->route('room.index');
    }
    public function deleteRoom($id)
    {
        $rooms = Room_List::find($id);
        $rooms->delete();
        return redirect()->route('room.index');
    }
}
