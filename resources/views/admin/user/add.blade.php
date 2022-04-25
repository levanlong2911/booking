@extends('template.admin.master')
@section('main-content')

    <body>
        <div class="formAdd">
            <h3>ADD USER</h3>
            <form action="{{ route('user.add') }}" method="post">
                @csrf
                <ul class="alert text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
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

                <label class="form-label" for="phoneNumber">Position</label>
                <div>
                    <select class="form-control selectpicker">
                        <option>Giám đốc</option>
                        <option>Trưởng phòng</option>
                        <option>Nhân viên</option>
                        <option>Thư ký</option>
                    </select>
                </div>
                <br>
                <br>
                <label class="form-label" for="phoneNumber">Department</label>
                <div>
                    <select class="form-control selectpicker">
                        <option>Kỹ thuật</option>
                        <option>Nhân sự</option>
                        <option>Kế toán</option>
                        <option>Kinh doanh</option>
                    </select>
                </div>
                <br>

                <div class="submit">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </body>
@endsection

</html>
