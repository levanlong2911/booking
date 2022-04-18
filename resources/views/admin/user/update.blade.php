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
            <form action="{{ route('updateUser', $users['id'])}}" method="post">
                @csrf
                <label class="form-label" for="name">Name</label>
                <input type="text" id="name" class="form-control form-control-lg" value="{{ Null !== old('name') ? old('name') : $users->name }}" /><br>

                <label class="form-label" for="lastName">Email</label>
                <input type="email" id="emailAddress" class="form-control form-control-lg"
                    value="{{ Null !== old('email') ? old('email') : $users->email }}" /><br>

                <h6 class="mb-2 pb-1">Gender: </h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender" value="Female"
                        checked />
                    <label class="form-check-label" for="femaleGender">Female</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender" value="Male" />
                    <label class="form-check-label" for="maleGender">Male</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender" value="Other" />
                    <label class="form-check-label" for="otherGender">Other</label>
                </div>
                <br>
                <br>

                <label class="form-label" for="phoneNumber">Phone Number</label>
                <input type="tel" id="phoneNumber" class="form-control form-control-lg"
                    value="{{ Null !== old('phone') ? old('phone') : $users->phone }}" /><br>

                <label class="form-label" for="position">Position</label>
                <input type="text" id="position" class="form-control form-control-lg"
                    value="{{ Null !== old('position') ? old('position') : $users->position }}" /><br>

                <label class="form-label" for="Department">Department</label>
                <input type="text" id="Department" class="form-control form-control-lg"
                    value="{{ Null !== old('department') ? old('department') : $users->department }}" /><br>
                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection

