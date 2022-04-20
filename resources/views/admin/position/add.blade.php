@extends('template.admin.master')
@section('main-content')

    <body>
        <div class="formAdd">
            <h3>ADD POSITION</h3>
            <form action="{{ route('position.add') }}" method="post">
                @csrf
                <ul class="alert text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <label class="form-label" for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg" /><br>
                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection

</html>
