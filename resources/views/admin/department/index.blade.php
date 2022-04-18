@extends('template.admin.master')
@section('main-content')
    <div class="content-container">
        <div class="row ml-5" id="mtr">
            <div>Department List</div>
        </div>
        <br />
        <a href="{{ route('addDepartment') }}"><button type="button" class="btn btn-secondary ml-5">Add New</button></a>
        <table class="table ml-5 mt-5">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departments as $department)
                    <tr>
                        <th scope="row">{{ $department['id'] }}</th>
                        <td>{{ $department['name'] }}</td>
                        <td>
                            <a href="{{ route('editDepartment', $department['id'])}}"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                            <a href="{{ route('deleteDepartment', $department['id'])}}"
                                onclick="return confirm('Bạn muốn xoá Department này?')"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
