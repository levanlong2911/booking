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
            <div>Department List</div>
        </div>
        <br />
        <form action="" method="GET">
            <a href="{{ route('department.show.add') }}"><button type="button" class="btn btn-secondary ml-5">Add New</button></a>
            <input type="search" name="search" placeholder="Enter keyword" value="{{ $search }}">
            <button type="submit">Search</button>
        </form>
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
                            <a href="{{ route('department.edit', $department['id']) }}"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                            <a href="{{ route('department.delete', $department['id']) }}"
                                onclick="return confirm('Bạn muốn xoá Department này?')"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $departments->links() !!}
    </div>
@endsection
