@extends('template.admin.master')
@section('main-content')

    <body>
        <div class="formAdd">
            <h3>ADD USER</h3>
            <form action="{{ route('addUser') }}" method="post">
                @csrf
                <label class="form-label" for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-lg" /><br>

                <label class="form-label" for="lastName">Email</label>
                <input type="email" name="email" id="emailAddress" class="form-control form-control-lg" /><br>

                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" id="password" /><br>

                <h6 class="mb-2 pb-1">Gender: </h6>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="femaleGender" value="Female" checked />
                    <label class="form-check-label" for="femaleGender">Female</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="maleGender" value="Male" />
                    <label class="form-check-label" for="maleGender">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="otherGender" value="Other" />
                    <label class="form-check-label" for="otherGender">Other</label>
                </div>
                <br>
                <br>
                <label class="form-label" for="phoneNumber">Phone Number</label>
                <input type="tel" name="phone" id="phoneNumber" class="form-control form-control-lg" /><br>

                <label class="form-label" for="position">Position</label>
                <input type="text" name="position" id="position" class="form-control form-control-lg" /><br>

                <label class="form-label" for="Department">Department</label>
                <input type="text" name="department" id="Department" class="form-control form-control-lg" /><br>

                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection

</html>
