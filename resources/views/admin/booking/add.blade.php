@extends('template.admin.master')
@section('main-content')

    <body>
        <div class="formAdd">
            <h3>ADD BOOKING</h3>
            <form action="{{ route('addBooking') }}" method="post">
                @csrf
                <label class="form-label" for="name">Title</label>
                <input type="text" name="title" id="name" class="form-control form-control-lg" /><br>

                <label class="form-label" for="lastName">Date</label>
                <input type="text" name="date" id="emailAddress" class="form-control form-control-lg" /><br>

                <label for="password" class="form-label">Time_start</label>
                <input type="text" name="time_start" class="form-control form-control-lg" id="password" /><br>

                <label class="form-label" for="phoneNumber">Time_end</label>
                <input type="tel" name="time_end" id="phoneNumber" class="form-control form-control-lg" /><br>

                <label class="form-label" for="position">Amount Of People</label>
                <input type="text" name="amount_of_people" id="position" class="form-control form-control-lg" /><br>

                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection

</html>
