@extends('template.admin.master')
@section('main-content')
    <div class="content-container">
        <div class="row ml-5" id="mtr">
            <div>Position List</div>
        </div>
        <br />
        <a href="{{ route('position.show.add') }}"><button type="button" class="btn btn-secondary ml-5">Add New</button></a>
        <table class="table ml-5 mt-5">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($positions as $position)
                    <tr>
                        <th scope="row">{{ $position['id'] }}</th>
                        <td>{{ $position['name'] }}</td>
                        <td>
                            <a href="{{ route('position.edit', $position['id'])}}"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                            <a href="{{ route('position.delete', $position['id'])}}"
                                onclick="return confirm('Bạn muốn xoá Position này?')"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
