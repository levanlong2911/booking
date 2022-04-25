<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    public function showAddBooking()
    {
        return view('admin.booking.add');
    }
    public function addBooking(BookingRequest $request)
    {
        $bookings = new Room;
        $bookings->fill($request->all())->save();
        return redirect()->route('booking.index')->with('message', 'Thêm phòng họp thành công');
    }

    // public function editBooking($id, Request $request)
    // {
    //     $bookings = Booking::find($id);
    //     if($request->isMethod('post')){
    //         $bookings = new Booking();
    //         $bookings->fill($request->all());
    //         if($bookings->save()){
    //             return redirect()->route('admin.index');
    //         } else {
    //             return redirect()->back();
    //         }
    //     }
    //     return view('admin.Booking.index', compact('Bookings'));
    // }
    public function showEditBooking($id)
    {
        $bookings = Room::find($id);
        return view('admin.booking.update', compact('bookings'));
    }
    public function bookingIndex()
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $bookings = Room::where('title', 'LIKE', "%$search%")
                ->orWhere('date', 'LIKE', "$search")
                ->get();
        } else {
            $bookings = Room::paginate(2);
        }
        return view('admin.booking.index',compact('bookings', 'search'));
    }
    public function updateBooking(BookingRequest $request, $id)
    {
        $bookings = Room::find($id);
        $bookings->fill($request->all())->update();
        return redirect()->route('booking.index')->with('message', 'Cập nhật phòng họp thành công');
    }
    public function deleteBooking($id)
    {
        $bookings = Room::find($id);
        $bookings->delete();
        return redirect()->route('booking.index')->with('delete', 'Xoá phòng họp thành công');
    }
}
