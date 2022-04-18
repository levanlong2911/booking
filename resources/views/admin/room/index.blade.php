@extends('template.admin.master')
@section('main-content')
    <div class="content-container">
        <div class="row ml-5" id="mtr">
            <div>Room List</div>
        </div>
        <br />
        <a href="{{ route('addRoom') }}"><button type="button" class="btn btn-secondary ml-5">Add New</button></a>
        <table class="table ml-5 mt-5">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                    <tr>
                        <th scope="row">{{ $room['id'] }}</th>
                        <td>{{ $room['name'] }}</td>
                        <td>
                            <a href="{{ route('editRoom', $room['id'])}}"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                            <a href="{{ route('deleteRoom', $room['id'])}}"
                                onclick="return confirm('Bạn muốn xoá Room này?')"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
