<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Room_list;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $room_lists = Room_list::all();
        return view('booking.home.index', compact('room_lists'));
    }

    public function book($id, Request $request)
    {
        $room_list = Room_list::find($id);
        // dd($room_list);
        if($request->isMethod('post'))
        {
            
        }
        return view('booking.home.book', compact('room_list'));
    }
}
