@extends('template.admin.master')
@section('main-content')

    <body>
        <div class="formAdd">
            <h3>ADD ROOM</h3>
            <form action="{{ route('addRoom') }}" method="post">
                @csrf
                <label class="form-label" for="name">Room Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg" /><br>
                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection

</html>
