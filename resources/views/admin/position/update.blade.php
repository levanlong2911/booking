@extends('template.admin.master')
@section('main-content')
    <style>
        .update-user {
            text-align: center;
            width: 600px;
            margin: auto;
        }

    </style>

    <body>
        <div class="update-user">
            <h4>UPDATE</h4>
            <form action="{{ route('updatePosition', $position['id'])}}" method="post">
                @csrf
                <label class="form-label" for="name">Name</label>
                <input type="text" id="name" class="form-control form-control-lg" value="{{ Null !== old('name') ? old('name') : $departments->name }}" /><br>
        </div>
        <div class="submit">
            <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
        </div>
        </form>
        </div>
    </body>
@endsection
