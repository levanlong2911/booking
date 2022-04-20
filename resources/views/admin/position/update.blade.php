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
            <form action="{{ route('position.update', $positions['id']) }}" method="post">
                @csrf
                <ul class="alert text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <label class="form-label" for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg"
                    value="{{ null !== old('name') ? old('name') : $positions->name }}" /><br>
                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection
