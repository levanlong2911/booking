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
        return redirect()->route('room.index')->with('message', 'Thêm phòng họp thành công');
    }
    public function roomIndex(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $rooms = Room_List::where('name', 'LIKE', "%$search%");
        }
        $rooms = Room_List::paginate(4);
        return view('admin.room.index', compact('rooms','search'));
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
        return redirect()->route('room.index')->with('message', 'Cập nhật phòng họp thành công');
    }
    public function deleteRoom($id)
    {
        $rooms = Room_List::find($id);
        $rooms->delete();
        return redirect()->route('room.index')->with('delete', 'Xoá phòng họp thành công');
    }
}
