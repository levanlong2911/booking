<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function addBooking(Request $request)
    {
        if ($request->isMethod('post')) {
            $bookings = new Booking;
            $bookings->fill($request->all())->save();
            return redirect()->route('admin.index');
        }
        return view('admin.booking.add');
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
        $bookings = Booking::find($id);
        return view('admin.booking.update', compact('bookings'));
    }
    public function bookingIndex()
    {
        $bookings = Booking::all();
        return view('admin.booking.index', compact('bookings'));
    }
    public function updateBooking(Request $request, $id)
    {
        $bookings = Booking::find($id);
        $bookings->name = $request->name;
        $bookings->email = $request->email;
        $bookings->gender = $request->gender;
        $bookings->phone = $request->phone;
        $bookings->position = $request->position;
        $bookings->department = $request->department;
        $bookings->update();

        return redirect()->route('admin.index');
    }
    public function deleteBooking($id)
    {
        $bookings = Booking::find($id);
        $bookings->delete();
        return redirect()->route('admin.index');
    }
}
