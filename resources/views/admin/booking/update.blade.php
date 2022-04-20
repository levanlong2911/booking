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
            <form action="{{ route('booking.update', $users['id']) }}" method="post">
                @csrf
                <ul class="alert text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <label class="form-label" for="name">Title</label>
                <input type="text" id="title" class="form-control form-control-lg" name="title"
                    value="{{ null !== old('title') ? old('title') : $users->title }}" /><br>

                <label class="form-label" for="lastName">Date</label>
                <input type="text" id="emailAddress" class="form-control form-control-lg" name="date"
                    value="{{ null !== old('date') ? old('date') : $users->date }}" /><br>

                <label class="form-label" for="name">Time start</label>
                <input type="text" id="time_start" class="form-control form-control-lg" name="time_start"
                    value="{{ null !== old('time_start') ? old('time_start') : $users->time_start }}" /><br>
                <br>
                <br>

                <label class="form-label" for="phoneNumber">Time end</label>
                <input type="text" id="phoneNumber" class="form-control form-control-lg" name="time_end"
                    value="{{ null !== old('time_end') ? old('time_end') : $users->time_end }}" /><br>

                <label class="form-label" for="position">Amount Of People</label>
                <input type="text" id="amount_of_people" class="form-control form-control-lg" name="amount_of_people"
                    value="{{ null !== old('amount_of_people') ? old('amount_of_people') : $users->amount_of_people }}" /><br>

                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection
