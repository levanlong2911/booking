@extends('template.admin.master')
@section('main-content')
    <div class="content-container">
        <div class="row ml-5" id="mtr">
            <div>User List</div>
        </div>
        <br />
        <a href="{{ route('addUser') }}"><button type="button" class="btn btn-secondary ml-5">Add New</button></a>
        <table class="table ml-5 mt-5">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Position</th>
                    <th scope="col">Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user['id'] }}</th>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['gender'] }}</td>
                        <td>{{ $user['phone'] }}</td>
                        <td>{{ $user['position'] }}</td>
                        <td>{{ $user['department'] }}</td>
                        <td>
                            <a href="{{ route('editUser', $user['id'])}}"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                            <a href="{{ route('deleteUser', $user['id'])}}"
                                onclick="return confirm('Bạn muốn xoá user này?')"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
