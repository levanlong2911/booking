@extends('template.admin.master')
@section('main-content')
    <div class="content-container">
        @if (Session::has('message'))
            <div class="alet alert-success" style="text-align: center">
                {{ Session::get('message') }}
            </div>
        @endif
        @if (Session::has('delete'))
            <div class="alet alert-danger" style="text-align: center">
                {{ Session::get('delete') }}
            </div>
        @endif
        <div class="row ml-5" id="mtr">
            <div>Booking List</div>
        </div>
        <br />
        <form action="" method="GET">
            <a href="{{ route('booking.show.add') }}"><button type="button" class="btn btn-secondary ml-5">Add New</button></a>
            <input type="search" name="search" placeholder="Enter keyword" value="{{ $search }}">
            <button type="submit">Search</button>
        </form>
        <table class="table ml-5 mt-5">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time_start</th>
                    <th scope="col">Time_end</th>
                    <th scope="col">Amount Of People</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <th scope="row">{{ $booking['id'] }}</th>
                        <td>{{ $booking['title'] }}</td>
                        <td>{{ $booking['date'] }}</td>
                        <td>{{ $booking['time_start'] }}</td>
                        <td>{{ $booking['time_end'] }}</td>
                        <td>{{ $booking['amount_of_people'] }}</td>
                        <td>
                            <a href="{{ route('booking.edit', $booking['id']) }}"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                            <a href="{{ route('booking.delete', $booking['id']) }}"
                                onclick="return confirm('B???n mu???n xo?? Room n??y?')"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $bookings->links() !!}
    </div>
@endsection
