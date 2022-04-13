<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="sidebar-container">
        <div class="sidebar-logo">
            <img class="logo" src="{{ asset('img/logo.png') }}" alt="">
        </div>
        <ul class="sidebar-navigation">
            <li class="header"></i>FACILITIES</li>
            <li>
                <a href="#">
                    <i class="fa fa-home" aria-hidden="true"></i> Meeting rooms
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> Help guide
                </a>
            </li>
            <li class="header">COMMUNITY</li>
            <li>
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i> Members
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-cog" aria-hidden="true"></i> Newsfeed
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Local area guide
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-info-circle" aria-hidden="true"></i> Benefits
                </a>
            </li>
        </ul>
    </div>

    <div class="content-container">
        <div class="row ml-5" id="mtr">
            <div>Meeting rooms</div>
        </div>
        <br/>
        <a href="{{ route('get.admin.add_user') }}"><button type="button" class="btn btn-secondary ml-5">Thêm</button></a>
        <table class="table ml-5 mt-5">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Position</th>
                    <th scope="col">Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                   <tr>
                        <th scope="row">{{ $user['id'] }}</th>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['gender'] }}</td>
                        <td>{{ $user['phone'] }}</td>
                        <td>{{ $user['position'] }}</td>
                        <td>{{ $user['department'] }}</td>
                        <td>
                            <a href="{{ url('edit-user/' . $user['id']) }}"><button type="button" class="btn btn-success">Edit</button></a>
                            <a href="{{ url('delete-user/' . $user['id']) }}" onclick="return confirm('Bạn muốn xoá user này?')"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
