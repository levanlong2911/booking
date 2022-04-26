<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room_list;
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
        $rooms = new Room_list;
        $rooms->fill($request->all())->save();
        return redirect()->route('room.index')->with('message', 'Thêm phòng họp thành công');
    }
    public function roomIndex(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $rooms = Room_list::where('name', 'LIKE', "%$search%");
        }
        $rooms = Room_list::paginate(4);
        return view('admin.room.index', compact('rooms','search'));
    }
    public function showEditRoom($id)
    {
        $rooms = Room_list::find($id);
        return view('admin.room.update', compact('rooms'));
    }
    public function updateRoom(RoomRequest $request, $id)
    {
        $rooms = Room_list::find($id);
        $rooms->fill($request->all())->update();
        return redirect()->route('room.index')->with('message', 'Cập nhật phòng họp thành công');
    }
    public function deleteRoom($id)
    {
        $rooms = Room_list::find($id);
        $rooms->delete();
        return redirect()->route('room.index')->with('delete', 'Xoá phòng họp thành công');
    }
}
